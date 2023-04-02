<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352.74 333">
    <defs>
        <style>
            .ellipse {
                fill:none;
                stroke-miterlimit:10;
                stroke-width:5px;
                opacity:0.6;
            }
            .ellipse1 {
                stroke:aqua;
                animation: rotation 1.5s ease infinite;
                transform-origin: center center;
            }
            .ellipse2 {
                stroke:#f6bbff;
                animation: rotation 1.5s ease infinite;
                animation-delay: -0.4s;
                transform-origin: center center;
            }
            .ellipse3 {
                stroke:#fff900;
                animation: rotation 1.5s ease infinite;
                animation-delay: -0.8s;
                transform-origin: center center;
            }
            .text {
                font-size:48px;
            }
            .loading-text{
                fill:#939393;
                animation: loading-text 2s ease infinite;
                transform-origin: center center;
            }
            .load-complete-text{
                fill:#727272;
                display: none;
            }

            @keyframes rotation {
                0% {
                    transform: scale(0.6) rotate(0deg);
                }
                50% {
                    transform: scale(1.0) rotate(180deg);
                }
                100% {
                    transform: scale(0.6) rotate(360deg);
                }
            }
            @keyframes loading-text {
                0%,100% {
                    transform: scale(0.8);
                    opacity: 0;
                }
                50% {
                    transform: scale(1.0);
                    opacity: 1;
                }
            }
        </style>
    </defs>
    <title>Loading</title>
    <ellipse class="ellipse ellipse1" cx="178.74" cy="166.5" rx="146.5" ry="164"/>
    <ellipse class="ellipse ellipse2" cx="178.74" cy="166.5" rx="164" ry="146.5" transform="translate(-59.3 111.68) rotate(-30)"/>
    <ellipse class="ellipse ellipse3" cx="178.74" cy="166.5" rx="146.5" ry="164" transform="translate(-54.82 238.05) rotate(-60)"/>
    <text class="text loading-text" x="89.68" y="178.49">Loading</text>
    <text class="text load-complete-text" transform="translate(0 183.28)">Load Complete!!</text>
</svg>