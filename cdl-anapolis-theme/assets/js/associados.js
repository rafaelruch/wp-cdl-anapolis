/**
 * Associados — Mapa Interativo + Lista + Filtros
 */
(function () {
    'use strict';

    var map, markers = [], infoWindow;
    var activeCard = null;
    var currentCat = 'all';
    var searchTerm = '';

    // Centro de Anápolis
    var CENTER = { lat: -16.3281, lng: -48.9529 };

    // ── Init lista + filtros (roda imediatamente) ──
    document.addEventListener('DOMContentLoaded', function () {

        // Filtros por categoria
        var pills = document.querySelectorAll('.assoc-pill');
        pills.forEach(function (pill) {
            pill.addEventListener('click', function () {
                pills.forEach(function (p) { p.classList.remove('active'); });
                pill.classList.add('active');
                currentCat = pill.getAttribute('data-cat');
                filterAll();
            });
        });

        // Busca
        var searchInput = document.getElementById('assocSearch');
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                searchTerm = this.value.toLowerCase().trim();
                filterAll();
            });
        }

        // Click nos cards — event delegation no container
        var listContainer = document.getElementById('assocListItems');
        if (listContainer) {
            listContainer.addEventListener('click', function (e) {
                var card = e.target.closest('.assoc-card');
                if (!card) return;

                var id = parseInt(card.getAttribute('data-id'));
                highlightCard(id);

                // Encontrar marker e abrir popup (se mapa carregou)
                if (map) {
                    var marker = markers.find(function (m) { return m._assocId === id; });
                    if (marker) {
                        map.panTo(marker.getPosition());
                        map.setZoom(16);
                        openPopup(marker, marker._assocData);
                    }
                }
            });
        }
    });

    // ── Init mapa (callback do Google Maps) ──
    window.initAssociadosMap = function () {
        var mapEl = document.getElementById('assocMap');
        if (!mapEl || typeof google === 'undefined') return;

        map = new google.maps.Map(mapEl, {
            center: CENTER,
            zoom: 14,
            styles: [
                { featureType: 'poi', stylers: [{ visibility: 'off' }] },
                { featureType: 'transit', stylers: [{ visibility: 'off' }] }
            ],
            disableDefaultUI: false,
            zoomControl: true,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: true,
            gestureHandling: 'cooperative',
        });

        infoWindow = new google.maps.InfoWindow();

        // Criar markers
        if (typeof cdlAssociados !== 'undefined') {
            cdlAssociados.forEach(function (a) {
                if (!a.lat || !a.lng) return;

                var marker = new google.maps.Marker({
                    position: { lat: a.lat, lng: a.lng },
                    map: map,
                    title: a.nome,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 9,
                        fillColor: '#03428e',
                        fillOpacity: 1,
                        strokeColor: '#fff',
                        strokeWeight: 2.5,
                    },
                });

                marker._assocData = a;
                marker._assocId = a.id;

                marker.addListener('click', function () {
                    openPopup(marker, a);
                    highlightCard(a.id);
                });

                markers.push(marker);
            });
        }
    };

    // ── Popup ──
    function openPopup(marker, a) {
        var endereco = a.endereco;
        if (a.bairro) endereco += ' — ' + a.bairro;
        if (a.cep) endereco += ', CEP ' + a.cep;

        var mapsUrl = 'https://www.google.com/maps/dir/?api=1&destination='
            + encodeURIComponent(a.endereco + ', ' + a.cidade + ' - ' + a.estado);

        var html = '<div class="assoc-popup">';

        if (a.categoria_nome) {
            html += '<div class="assoc-popup__cat">' + escHtml(a.categoria_nome) + '</div>';
        }

        html += '<div class="assoc-popup__name">' + escHtml(a.nome) + '</div>';

        if (a.cnpj) {
            html += '<div class="assoc-popup__row">'
                + '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>'
                + '<span>' + escHtml(a.cnpj) + '</span></div>';
        }

        html += '<div class="assoc-popup__row">'
            + '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>'
            + '<span>' + escHtml(endereco) + '</span></div>';

        if (a.telefone) {
            html += '<div class="assoc-popup__row">'
                + '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72"/></svg>'
                + '<span class="assoc-popup__tel">' + escHtml(a.telefone) + '</span></div>';
        }

        html += '<a href="' + mapsUrl + '" target="_blank" rel="noopener" class="assoc-popup__btn">'
            + '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>'
            + 'Como chegar</a>';

        html += '</div>';

        infoWindow.setContent(html);
        infoWindow.open(map, marker);
    }

    // ── Highlight card ──
    function highlightCard(id) {
        if (activeCard) activeCard.classList.remove('active');

        var card = document.querySelector('.assoc-card[data-id="' + id + '"]');
        if (card) {
            card.classList.add('active');
            card.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            activeCard = card;
        }
    }

    // ── Filter ──
    function filterAll() {
        var cards = document.querySelectorAll('.assoc-card');
        var visibleCount = 0;

        cards.forEach(function (card) {
            var catMatch = currentCat === 'all' || card.getAttribute('data-cat') === currentCat;
            var nome = card.getAttribute('data-nome') || '';
            var endereco = card.getAttribute('data-endereco') || '';
            var searchMatch = !searchTerm || nome.indexOf(searchTerm) !== -1 || endereco.indexOf(searchTerm) !== -1;

            if (catMatch && searchMatch) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Atualizar markers no mapa
        markers.forEach(function (marker) {
            var a = marker._assocData;
            var catMatch = currentCat === 'all' || a.categoria === currentCat;
            var nome = a.nome.toLowerCase();
            var endereco = (a.endereco + ' ' + a.bairro).toLowerCase();
            var searchMatch = !searchTerm || nome.indexOf(searchTerm) !== -1 || endereco.indexOf(searchTerm) !== -1;

            marker.setVisible(catMatch && searchMatch);
        });

        // Counters
        var countEl = document.getElementById('assocCount');
        var listCountEl = document.getElementById('assocListCount');
        if (countEl) countEl.textContent = visibleCount;
        if (listCountEl) listCountEl.textContent = visibleCount;

        // Empty state
        var emptyEl = document.getElementById('assocEmpty');
        if (emptyEl) emptyEl.style.display = visibleCount === 0 ? '' : 'none';

        // Fit bounds
        if (map && visibleCount > 0) {
            var bounds = new google.maps.LatLngBounds();
            markers.forEach(function (m) {
                if (m.getVisible()) bounds.extend(m.getPosition());
            });
            if (!bounds.isEmpty()) map.fitBounds(bounds, 60);
        }
    }

    // ── Helpers ──
    function escHtml(s) {
        var div = document.createElement('div');
        div.appendChild(document.createTextNode(s));
        return div.innerHTML;
    }

})();
