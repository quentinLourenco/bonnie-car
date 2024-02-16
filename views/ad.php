<?php 
include_once '../public/includes/header.php';
?>
<link rel="stylesheet" type = "text/css" href ="../public/css/ad.css">
<div id="containerAd">
<h1>Annonce</h1>
    <div id ='main'>
        <div id='infoAd'>
            <img id='imgAd' src="<?= $glob_dev.'/assets/images/'.htmlspecialchars($ad['picture_url']) ?>" alt="">
            <div id='infoComplementaireAd'>
                <h2><?= htmlspecialchars($ad['brand']) ?></h2>
                <br>
                <h3><?= htmlspecialchars($ad['model']) ?></h3>
                <br>
                <p><?= htmlspecialchars($ad['engine_size']) ?> cm³</p>
                <br>
                <p><?= htmlspecialchars($ad['year']) ?></p>
                <br>
                <?php if(htmlspecialchars($ad['type'])==='electrique'){?>
                    <p> Électrique </p>
                <?php }else{?>
                    <p> Essence </p>
                <?php } ?>
                <br>
                <p><?= htmlspecialchars($ad['location']) ?></p>
                <br>
                <p><?= htmlspecialchars($ad['mileage']) ?> km</p>
                <br>
                <h2><?= htmlspecialchars($ad['price']) ?> € </h2>
                <button>OBTENIR UN RENDEZ VOUS</button>
                <br>
                <div id='tel'>
                    <svg fill="#12486B"xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="34" height="34"><path d="M23,11a1,1,0,0,1-1-1,8.008,8.008,0,0,0-8-8,1,1,0,0,1,0-2A10.011,10.011,0,0,1,24,10,1,1,0,0,1,23,11Zm-3-1a6,6,0,0,0-6-6,1,1,0,1,0,0,2,4,4,0,0,1,4,4,1,1,0,0,0,2,0Zm2.183,12.164.91-1.049a3.1,3.1,0,0,0,0-4.377c-.031-.031-2.437-1.882-2.437-1.882a3.1,3.1,0,0,0-4.281.006l-1.906,1.606A12.784,12.784,0,0,1,7.537,9.524l1.6-1.9a3.1,3.1,0,0,0,.007-4.282S7.291.939,7.26.908A3.082,3.082,0,0,0,2.934.862l-1.15,1C-5.01,9.744,9.62,24.261,17.762,24A6.155,6.155,0,0,0,22.183,22.164Z"/></svg>
                    <h4>+33 (0)9 75 18 56 48</h4>
                </div>
                
            </div>
        </div>
        <div>
            <div id='caracteristiquesAd'>
                <h2>Caracteristiques</h2>
                <div id='tabRow'>
                    <div id='tab1'>
                        <div class='elmtTab'>
                            <p>Mise en circulation</p>
                            <p><?= htmlspecialchars($ad['year']) ?></p>
                        </div>
                        <div class='elmtTab'>
                            <p>Energie</p>
                            <?php if(htmlspecialchars($ad['type'])==='electrique'){?>
                                <p> Électrique </p>
                            <?php }else{?>
                                <p> Essence </p>
                            <?php } ?>
                        </div>
                        <div class='elmtTab'>
                            <p>Cylindrée</p>
                            <p><?= htmlspecialchars($ad['engine_size']) ?> cm³</p>
                        </div>
                        <div class='elmtTab'>
                            <p>Première main</p>
                            <?php if(htmlspecialchars($ad['first_hand'])==='1'){?>
                                <p> Oui </p>
                            <?php }else{?>
                                <p> Non </p>
                            <?php } ?>
                        </div>
                        <div class='elmtTab'>
                            <p>Nombres de places</p>
                            <p>2</p>
                        </div>
                        <div class='elmtTab'>
                            <p>Couleur</p>
                            <p>Bleu métal</p>
                        </div>
                    </div>
                    <div id='tab2'>
                        <div class='elmtTab'>
                            <p>Kilométrage</p>
                            <p><?= htmlspecialchars($ad['mileage']) ?> km</p>
                        </div>
                        <div class='elmtTab'>
                            <p>Crit'air</p>
                            <p>2</p>
                        </div>
                        <div class='elmtTab'>
                            <p>Puissance</p>
                            <p>50 CV</p>
                        </div>
                        <div class='elmtTab'>
                            <p>Emission CO2</p>
                            <p>N/A</p>
                        </div>
                        <div class='elmtTab'>
                            <p>Boite de vitesse</p>
                            <?php if(htmlspecialchars($ad['type'])==='electrique'){?>
                                <p> Automatique </p>
                            <?php }else{?>
                                <p> Manuelle </p>
                            <?php } ?>
                        </div>
                        <div class='elmtTab'>
                            <p>Nombres de propriétaires</p>
                            <p><?= htmlspecialchars($ad['history']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id='visibiliteAd'>
                <p> 960 personnes ont visualisé cette annonce récemment</p>
            </div>
        </div>
        <div id='mainContainerStepAd'>
            <h2 id='titleStepAd'>Intéressé, alors comment ça marche ? </h2>
            <div id='ContainerStepAd'>
                <div class='stepAd'>
                        <p>1</p>
                        <div class='InfoStepAd'> 
                            <svg fill="#12486B" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="50" height="50"><path d="M23,11a1,1,0,0,1-1-1,8.008,8.008,0,0,0-8-8,1,1,0,0,1,0-2A10.011,10.011,0,0,1,24,10,1,1,0,0,1,23,11Zm-3-1a6,6,0,0,0-6-6,1,1,0,1,0,0,2,4,4,0,0,1,4,4,1,1,0,0,0,2,0Zm2.183,12.164.91-1.049a3.1,3.1,0,0,0,0-4.377c-.031-.031-2.437-1.882-2.437-1.882a3.1,3.1,0,0,0-4.281.006l-1.906,1.606A12.784,12.784,0,0,1,7.537,9.524l1.6-1.9a3.1,3.1,0,0,0,.007-4.282S7.291.939,7.26.908A3.082,3.082,0,0,0,2.934.862l-1.15,1C-5.01,9.744,9.62,24.261,17.762,24A6.155,6.155,0,0,0,22.183,22.164Z"/></svg>
                            <p class='titleInfoStepAd'>1er Appel</p>
                            <p>Premier contact téléphonique avec votre conseiller</p>
                        </div>
                </div>
                <div class='stepAd'>
                        <p>2</p>
                        <div class='InfoStepAd'> 
                            <svg fill="#12486B" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" width="50" height="50"><path d="M0,8v-1C0,4.243,2.243,2,5,2h1V1c0-.552,.447-1,1-1s1,.448,1,1v1h8V1c0-.552,.447-1,1-1s1,.448,1,1v1h1c2.757,0,5,2.243,5,5v1H0Zm24,2v9c0,2.757-2.243,5-5,5H5c-2.757,0-5-2.243-5-5V10H24Zm-12,9c0-.552-.447-1-1-1H6c-.553,0-1,.448-1,1s.447,1,1,1h5c.553,0,1-.448,1-1Zm7-4c0-.552-.447-1-1-1H6c-.553,0-1,.448-1,1s.447,1,1,1h12c.553,0,1-.448,1-1Z"/></svg>
                            <p class='titleInfoStepAd'>Agenda</p>
                            <p>Organisations du rendez-vous pour la visite ou l'achat</p>
                        </div>
                </div>
                <div class='stepAd'>
                        <p>3</p>
                        <div class='InfoStepAd'> 
                            <svg width="60" height="60" viewBox="0 0 663 502" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_610_9547)"><path d="M66.7398 267.82L67.0298 267.64L66.7198 267.81C65.2698 268.57 63.8998 269.41 62.5898 270.4L66.7498 267.85V267.83L66.7398 267.82Z" fill="#82BFAB"/><path d="M272.399 344.12C264.269 337.5 256.599 330.15 249.539 322.07L166.699 373.36L195.939 391.47L203.949 386.51C205.729 385.09 207.669 383.83 209.799 382.88L272.399 344.11V344.12Z" fill="#FFDE59"/><path d="M219.33 275.19C214.92 265.49 211.35 255.59 208.69 245.56L96.4198 315.07L93.0298 317.15L92.0898 317.75L93.0898 317.2C99.5198 325.33 106.81 332.9 114.97 339.78L119.41 337.03L127.59 331.98L219.31 275.2L219.33 275.19Z" fill="#FFDE59"/><path d="M202.85 183.56L290.05 129.58L290.09 129.65L327.65 106.42L329.05 105.54L331.31 103.17C329.05 100.43 327.96 96.95 328.5 93.47L328.63 92.9C328.92 91.5 329.39 90.13 330.17 88.84L331.31 87.64C335.18 82.95 341.83 81.53 347.19 84.7L347.58 84.94L454.86 151.94L476.4 165.4C482.49 169.65 490.24 171.42 498.02 169.62C512.64 166.23 521.74 151.64 518.37 137.05C516.64 129.57 511.97 123.6 505.9 119.95L505.14 119.48L370.74 35.54L370.67 35.61L370.34 35.39C357.81 27.62 344.68 21.69 331.32 17.16C298.28 5.93 263.43 4.14 230.47 11.25C222.74 12.89 215.15 15.01 207.7 17.61C201.01 19.95 194.46 22.68 188.04 25.77C174.58 28.51 160.12 26.37 147.52 18.58L117.53 0L0 189.85L27.23 206.7L44.17 217.19C52.91 225.07 58.74 235.32 61.22 246.33L61.71 248.94C62.45 252.93 63.48 256.85 64.55 260.77C65.2 263.14 65.97 265.48 66.72 267.81L67.03 267.64L202.85 183.56Z" fill="#FFDE59"/><path d="M545.08 0L515.1 18.56C502.49 26.35 488.04 28.48 474.58 25.75C468.18 22.67 461.62 19.93 454.92 17.59C447.48 14.99 439.87 12.87 432.18 11.23C399.2 4.12 364.35 5.9 331.3 17.14C344.67 21.68 357.8 27.61 370.32 35.37L370.65 35.59L370.72 35.52L505.12 119.46L505.88 119.93C511.95 123.58 516.62 129.56 518.35 137.03C521.73 151.62 512.62 166.21 498 169.6C490.22 171.4 482.46 169.63 476.38 165.38L454.84 151.92L347.56 84.92L347.17 84.68C341.81 81.51 335.16 82.93 331.29 87.62L332.44 88.82C335.3 93.49 334.59 99.16 331.29 103.15L329.03 105.52L327.63 106.4L290.07 129.63L290.03 129.56L202.83 183.54L67.0099 267.62L66.7199 267.82L62.5599 270.37C55.8099 275.51 51.3799 283.53 51.3799 292.69C51.3799 308.23 63.9599 320.81 79.4999 320.81C84.0399 320.81 88.2799 319.62 92.0599 317.73L92.9999 317.13L96.3899 315.05L208.66 245.54C211.32 255.57 214.89 265.47 219.3 275.17L127.58 331.95L119.4 337C113.54 342.16 109.74 349.62 109.74 358.04C109.74 373.58 122.34 386.16 137.88 386.16C145.28 386.16 151.99 383.24 157.01 378.54L157.41 379.09L166.68 373.34L249.52 322.05C256.59 330.13 264.25 337.48 272.38 344.1L209.78 382.87C207.65 383.81 205.71 385.08 203.93 386.5C197.43 391.6 193.19 399.43 193.19 408.31C193.19 423.74 205.69 436.21 221.13 436.21C229.22 436.21 236.46 432.73 241.56 427.22L242.4 428.3L249.05 424.18L302.04 391.36L317.94 381.51V367.36L317.81 364.68L317.94 362C319.3 347.81 331.25 336.71 345.8 336.71C361.13 336.73 373.58 349.09 373.74 364.41V364.97L373.72 399.55V448.8L404.49 429.75V426.03L404.45 425.75L404.49 425.48V395.7L404.53 352.99V323.52L404.46 322.19L404.54 320.84C404.85 313.91 407.72 307.64 412.2 302.95C417.29 297.63 424.41 294.31 432.37 294.29C440.31 294.31 447.45 297.63 452.53 302.95C457.32 307.97 460.26 314.73 460.26 322.21L460.21 323.56L460.34 323.54V395.39L491.1 376.33V344.44L491.12 304.8V304.71L491.08 303.71L491.26 301.1V297.67H491.8C493.7 289.19 499.44 282.15 507.14 278.52C510.75 276.8 514.77 275.77 519.01 275.77C532.37 275.79 543.48 285.16 546.23 297.67H546.76V302.01L546.88 303.14L546.95 303.74L546.88 305.02V340.4C567.8 322.95 583.36 300.92 592.84 276.68C596.36 267.69 599.04 258.39 600.88 248.93L601.35 246.32C603.85 235.3 609.67 225.06 618.42 217.18L635.35 206.69L662.57 189.84L545.08 0Z" fill="#12486B"/><path d="M460.361 323.55L460.231 323.57L460.281 322.22C460.281 314.74 457.341 307.98 452.551 302.96C447.471 297.64 440.331 294.32 432.391 294.3C424.441 294.32 417.311 297.64 412.221 302.96C407.741 307.65 404.871 313.92 404.561 320.85L404.481 322.2L404.561 323.53V331.01L404.551 353L404.511 395.71V425.49L404.471 425.76L404.511 426.04V429.76L404.851 429.54C406.731 443.14 418.241 453.65 432.351 453.65C446.461 453.65 458.141 442.98 459.871 429.25H460.111V426.99L460.241 425.77L460.111 424.55V395.53L460.341 395.41V351.35L460.351 323.56L460.361 323.55Z" fill="#FFDE59"/><path d="M373.78 364.98V364.42C373.63 349.1 361.17 336.74 345.84 336.72C331.29 336.72 319.34 347.83 317.98 362.01L317.85 364.69L317.98 367.37V401.21L302.08 391.36L249.09 424.18L278.32 442.27L286.33 437.31L286.94 436.94L317.97 417.72V483.28L317.96 483.35L319.41 482.45C322.97 493.72 333.4 501.93 345.86 501.93C360.05 501.93 371.64 491.28 373.38 477.55H373.62V475.29L373.75 474.07L373.62 472.85V448.9L373.77 448.79V399.54L373.81 364.96L373.78 364.98Z" fill="#FFDE59"/><path d="M546.979 303.75L546.909 303.15L546.789 302.02V297.68H546.259C543.509 285.17 532.399 275.8 519.039 275.78C514.789 275.78 510.779 276.82 507.169 278.53C499.469 282.16 493.729 289.2 491.829 297.68H491.289V301.11L491.109 303.72L491.149 304.72V304.81L491.129 344.45V376.34L491.299 376.23V380.73L491.179 381.9L491.299 383.09V385.39H491.539C493.259 399.12 504.849 409.79 519.049 409.79C533.249 409.79 544.859 399.12 546.559 385.39H546.799V383.13L546.919 381.91L546.799 380.71V340.5L546.919 340.41V305.03L546.989 303.75H546.979Z" fill="#FFDE59"/><path d="M317.95 437.4V417.74L286.92 436.96L286.31 437.33C278.97 442.36 274.16 450.78 274.16 460.33C274.16 475.75 286.65 488.25 302.07 488.25C307.96 488.25 313.41 486.41 317.93 483.31V450.5L317.94 437.41L317.95 437.4Z" fill="#12486B"/></g><defs><clipPath id="clip0_610_9547"><rect width="662.6" height="501.95" fill="white"/></clipPath></defs></svg>
                            <p class='titleInfoStepAd'>Mise en relation</p>
                            <p>Mise en relation avec le vendeur</p>
                        </div>
                </div>
                <div class='stepAd'>
                        <p>4</p>
                        <div class='InfoStepAd'> 
                            <svg id="Layer_1" height="50" viewBox="0 0 24 24" width="50" fill="#12486B" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m14 7v-6.54a6.977 6.977 0 0 1 2.465 1.59l3.484 3.486a6.954 6.954 0 0 1 1.591 2.464h-6.54a1 1 0 0 1 -1-1zm8 3.485v8.515a5.006 5.006 0 0 1 -5 5h-10a5.006 5.006 0 0 1 -5-5v-14a5.006 5.006 0 0 1 5-5h4.515c.163 0 .324.013.485.024v6.976a3 3 0 0 0 3 3h6.976c.011.161.024.322.024.485zm-8 8.515a1 1 0 0 0 -1-1h-5a1 1 0 0 0 0 2h5a1 1 0 0 0 1-1zm3-4a1 1 0 0 0 -1-1h-8a1 1 0 0 0 0 2h8a1 1 0 0 0 1-1z"/></svg>
                            <p class='titleInfoStepAd'>Documents</p>
                            <p>Préparation des documents du véhicule et liés à la vente</p>
                        </div>
                </div>
                <div class='stepAd'>
                        <p>5</p>
                        <div class='InfoStepAd'> 
                            <svg xmlns="http://www.w3.org/2000/svg" id="Filled" viewBox="0 0 24 24" fill='#12486B' width="50" height="50"><path d="M18.581,2.14,12.316.051a1,1,0,0,0-.632,0L5.419,2.14A4.993,4.993,0,0,0,2,6.883V12c0,7.563,9.2,11.74,9.594,11.914a1,1,0,0,0,.812,0C12.8,23.74,22,19.563,22,12V6.883A4.993,4.993,0,0,0,18.581,2.14ZM16.718,9.717l-4.272,4.272a1.873,1.873,0,0,1-1.335.553h-.033a1.872,1.872,0,0,1-1.345-.6l-2.306-2.4A1,1,0,1,1,8.868,10.16L11.112,12.5,15.3,8.3a1,1,0,0,1,1.414,1.414Z"/></svg>
                            <p class='titleInfoStepAd'>Vérification</p>
                            <p>Vérification du moyen de paiement</p>
                        </div>
                </div>
                <div class='stepAd'>
                        <p>6</p>
                        <div class='InfoStepAd'> 
                        <svg xmlns="http://www.w3.org/2000/svg" id="Filled" viewBox="0 0 24 24" fill='#12486B' width="50" height="50"><path d="M19,3H5A5.006,5.006,0,0,0,0,8H24A5.006,5.006,0,0,0,19,3Z"/><path d="M0,16a5.006,5.006,0,0,0,5,5H19a5.006,5.006,0,0,0,5-5V10H0Zm7-.5A1.5,1.5,0,1,1,5.5,14,1.5,1.5,0,0,1,7,15.5"/></svg>

                            <p class='titleInfoStepAd'>Transaction</p>
                            <p>Transaction afin de régler le paiement du véhicule</p>
                        </div>
                </div>
                <div class='stepAd'>
                        <p>7</p>
                        <div class='InfoStepAd'> 
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" fill='#12486B' width="50" height="50">
                                <path d="m22.828,9.914l-3.44-3.44c-.606-3.7-3.784-6.474-7.638-6.474-3.644,0-6.781,2.542-7.561,6.074h0c-2.536.451-4.189,2.445-4.189,4.911,0,2.05,1.234,3.812,3,4.584v.931l.88.88c.216.216.216.566,0,.782l-.718.718c-.216.216-.216.566,0,.782l.718.718c.216.216.216.566,0,.782l-.718.718c-.216.216-.216.566,0,.782l.98.98c.474.474,1.244.474,1.718,0l.703-.703c.28-.28.437-.66.437-1.056v-6.312c1.766-.772,3-2.533,3-4.584,0-2.329-1.6-4.268-3.756-4.823.701-2.437,2.924-4.162,5.506-4.162,2.819,0,5.151,2.002,5.647,4.689l-3.225,3.225c-.745.744-1.172,1.775-1.172,2.828v7.258c0,2.206,1.794,4,4,4h3c2.206,0,4-1.794,4-4v-7.258c0-1.053-.427-2.084-1.172-2.828Zm-17.828,1.072c-.828,0-1.5-.672-1.5-1.5s.672-1.5,1.5-1.5,1.5.672,1.5,1.5-.672,1.5-1.5,1.5Z"/>
                            </svg>
                            <p class='titleInfoStepAd'>A vous la route</p>
                            <p>Remise des clés et à vous la route !</p>
                        </div>
                </div>
            </div>
        </div>
        <div id="containerComparateur">
            <h2>Grâce à ce comparateur, estimez le prix de votre contract pour votre nouveau véhicule.</h2>
            <div id="comparateurDiv">
                <div id="monBesoinComparateur">
                    <h3>Je décris mon besoin</h3>
                    <form action="/submit_assurance" method="post">
                        <label for="type_vehicule">Type de véhicule</label>
                        <br>
                        <select id="type_vehicule" name="type_vehicule">
                        <option value="moto">Moto</option>
                        <option value="quad">Quad</option>
                        <option value="electrique">Électrique</option>
                        <option value="scooter">Scooter</option>
                        </select>
                        <br>

                        <label for="cylindree">Cylindrée de mon véhicule</label>
                        <br>
                        <select id="cylindree" name="cylindree">
                        <option value="selectionner" selected>Sélectionner</option>
                        <option value="50">50</option>
                        <option value="125">125</option>
                        <option value="150">150</option>
                        <option value="250">250</option>
                        <option value="500">500</option>
                        </select>
                        <br>

                        <label for="recherche_assurance">Ma recherche d'assurance concerne</label>
                        <br>
                        <select id="recherche_assurance" name="recherche_assurance">
                        <option value="deja_possede">Un véhicule que je possède déjà</option>
                        <option value="en_cours_acquisition">Un véhicule en cours d'acquisition</option>
                        </select>
                        <br>

                        <label for="carte_grise">Titulaire de la carte grise</label>
                        <br>
                        <select id="carte_grise" name="carte_grise">
                        <option value="moi">Moi</option>
                        <option value="autre">Autre</option>
                        </select>
                        <br>

                    </form>
                </div>
                <div id="containerInfoPersoComparateur">
                    <h3>Je décris mes informations personnelles</h3>
                    <div id="infoPersoComparateur">
                        <div id="labelInfoPerso">
                            <label for="date">Date de naissance</label>
                            <br>
                            <label for="matrimonale">Situation matrimonale</label>
                            <br>
                            <label for="profession">Profession</label>
                            <br>
                            <label for="permis">Je possède le permis</label>
                            <br>
                            <label id="labelTypePermis" for="typePermis">Types de permis MOTO</label>
                            <br>
                            <label id="labelDatePermis"for="datePermis">Date d'obtention du permis auto</label>
                        </div>
                        <div id="inputInfoPerso">
                            <form action="">
                                <input type="date" id="date" name="date">
                                <br>
                                <select id="matrimonale" name="matrimonale">
                                <option value="Celibataire">Célibataire</option>
                                <option value="Marie">Marié(e)</option>
                                </select>
                                <br>
                                <select id="profession" name="profession">
                                <option value="selectionner" selected>Sélectionner</option>
                                <option value="employe">Employé</option>
                                <option value="entrepreneur">Entrepreneur</option>
                                <option value="freelance">Freelance</option>
                                <option value="autre">Autre</option>
                                </select>
                                <br>
                                <select id="permis" name="permis">
                                <option value="autoMoto">Auto et moto</option>
                                <option value="Auto">Auto</option>
                                <option value="Moto">Moto</option>
                                </select>
                                <br>
                                <input type="checkbox" id="permis_a1" name="permis_a1" value="permis_a1">
                                <label for="permis_a1">Permis A1</label>
                                <br>
                                <input type="checkbox" id="permis_a2" name="permis_a2" value="permis_a2">
                                <label for="permis_a2">Permis A2</label>
                                <br>
                                <input type="checkbox" id="permis_a" name="permis_a" value="permis_a">
                                <label for="permis_a">Permis A</label>
                                <br>
                                <input type="date" id="datePermis" name="datePermis">
                            </form>
                        </div>
                        
                    </div>
                    <label for="etatPermis">Votre permis a-t-il déjà été suspendu, retiré ou annulé ?</label>
                    <select id="etatPermis" name="etatPermis">
                    <option value="non">Non, jamais</option>
                    <option value="suspendu">suspendu</option>
                    <option value="retire">retiré</option>
                    <option value="annule">annulé</option>
                    </select>
                    <button id="btnSubmit">VALIDER ET CONTINUER</button>
                </div>
                
            </div> 
        </div>     
    </div>
</div>
    
<?php 
include_once '../public/includes/footer.php';
?>