<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asuka Langley Sohryu | EVA-02 Pilot</title>
    <link rel="icon" type="image/jpeg" href="/images/asuka/icon.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;700&family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">

    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.5.0/model-viewer.min.js"></script>

    <style>
        :root {
            --primary: #E60012;
            --secondary: #FF8C00;
            --accent: #00FF41;
            --bg-dark: #0A0A0B;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
            --asuka-red: rgba(230, 0, 18, 0.15);
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-dark);
            color: #fff;
            overflow: hidden;
            height: 100vh;
            width: 100vw;
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }




        .liquid-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: 
                radial-gradient(circle at 20% 30%, var(--asuka-red) 0%, transparent 40%),
                radial-gradient(circle at 80% 70%, rgba(255, 140, 0, 0.1) 0%, transparent 40%),
                url('/images/asuka/bg.png');
            background-size: cover;
            background-position: center;
            filter: contrast(120%) brightness(80%);
        }

        .liquid-mesh {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent, rgba(230, 0, 18, 0.05));
            backdrop-filter: blur(100px);
            z-index: -1;
        }

        main {
            display: grid;
            grid-template-columns: 1fr 1fr;
            height: 100vh;
            width: 100%;
        }


        .info-panel {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 10%;
            background: linear-gradient(90deg, rgba(10, 10, 11, 0.8) 0%, transparent 100%);
            backdrop-filter: blur(10px);
            z-index: 2;
        }

        h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: clamp(3rem, 8vw, 6rem);
            font-weight: 700;
            text-transform: uppercase;
            line-height: 0.9;
            margin-bottom: 0.5rem;
            background: linear-gradient(to bottom, #fff, #888);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeIn 1.5s ease-out;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .title-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 2px solid var(--primary);
            object-fit: cover;
            box-shadow: 0 0 20px rgba(230, 0, 18, 0.4);
        }


        .jp-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.5rem;
            color: rgba(255, 255, 255, 0.4);
            margin-bottom: 2rem;
            letter-spacing: 0.3rem;
            animation: fadeIn 2s ease-out;
        }


        .subtitle {
            font-family: 'Space Grotesk', sans-serif;
            color: var(--primary);
            letter-spacing: 0.5rem;
            text-transform: uppercase;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .subtitle::before {
            content: '';
            width: 50px;
            height: 2px;
            background: var(--primary);
        }


        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1.5rem;
            margin-top: 3rem;
            perspective: 1000px;
        }

        .stat-card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            padding: 1.5rem;
            border-radius: 12px;
            backdrop-filter: blur(20px);
            transition: transform 0.1s ease-out, box-shadow 0.3s ease;
            transform-style: preserve-3d;
            cursor: pointer;
        }

        .stat-card:hover {
            border-color: var(--primary);
            box-shadow: 0 10px 30px rgba(230, 0, 12, 0.2);
        }

        .stat-label {
            font-size: 0.7rem;
            color: #888;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.5rem;
            font-weight: 500;
        }


        .hero-panel {
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            overflow: hidden;
        }

        .hero-img, model-viewer {
            width: 100%;
            height: 90%;
            z-index: 1;
            filter: drop-shadow(0 0 50px rgba(230, 0, 18, 0.3));
        }

        model-viewer {
            --poster-color: transparent;
            outline: none;
        }


        .scanline-effect {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                to bottom,
                transparent 50%,
                rgba(0, 255, 65, 0.02) 50%
            );
            background-size: 100% 4px;
            z-index: 3;
            pointer-events: none;
        }


        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }


        @media (max-width: 1024px) {
            main {
                grid-template-columns: 1fr;
                grid-template-rows: auto 1fr;
            }
            .info-panel {
                padding-top: 5rem;
                background: linear-gradient(180deg, rgba(10, 10, 11, 0.9) 0%, transparent 100%);
            }
            body {
                overflow-y: auto;
            }
            .hero-img {
                height: 500px;
            }
        }


        .hud-details {
            position: absolute;
            bottom: 2rem;
            right: 2rem;
            text-align: right;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.7rem;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 2px;
            opacity: 0.5;
        }



        .interaction-btn {
            position: absolute;
            bottom: 2rem;
            left: 2rem;
            background: rgba(0, 255, 65, 0.1);
            border: 1px solid var(--accent);
            color: var(--accent);
            padding: 0.6rem 1.2rem;
            border-radius: 4px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
            backdrop-filter: blur(10px);
        }

        .interaction-btn:hover {
            background: var(--accent);
            color: #000;
        }

        .interaction-btn.unlocked {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }


        .lang-switcher {
            position: fixed;
            top: 2rem;
            right: 2rem;
            z-index: 100;
        }

        .lang-btn {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-family: 'Space Grotesk', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .lang-btn:hover {
            border-color: var(--primary);
        }

        .lang-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            padding-top: 5px;
            background: transparent;
            display: none;
            z-index: 100;
        }


        .lang-list {
            background: rgba(10, 10, 11, 0.95);
            border: 1px solid var(--glass-border);
            border-radius: 4px;
            overflow: hidden;
            backdrop-filter: blur(20px);
            min-width: 150px;
        }

        .lang-switcher:hover .lang-dropdown {
            display: block;
        }

        .lang-option {
            padding: 0.7rem 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            font-size: 0.9rem;
            transition: background 0.2s;
            color: #fff;
        }


        .lang-option:hover {
            background: rgba(230, 0, 18, 0.1);
        }

        .flag {
            width: 20px;
            height: 15px;
            object-fit: cover;
            border-radius: 2px;
        }
    </style>




</head>
<body>
    <div class="liquid-bg"></div>
    <div class="liquid-mesh"></div>
    
    <div class="lang-switcher">
        <button class="lang-btn">
            <img src="https://flagcdn.com/w20/es.png" class="flag" id="current-flag">
            <span id="current-lang">Español</span>
        </button>
        <div class="lang-dropdown">
            <div class="lang-list">
                <div class="lang-option" onclick="changeLang('es')"><img src="https://flagcdn.com/w20/es.png" class="flag"> Español</div>
                <div class="lang-option" onclick="changeLang('en')"><img src="https://flagcdn.com/w20/us.png" class="flag"> English</div>
                <div class="lang-option" onclick="changeLang('jp')"><img src="https://flagcdn.com/w20/jp.png" class="flag"> 日本語</div>
            </div>
        </div>
    </div>



    <main>
        <section class="info-panel">
            <div class="subtitle" id="trans-subtitle">Piloto del EVA-02</div>
            <h1>
                Asuka<br>Langley
                <img src="/images/asuka/icon.jpg" class="title-icon" alt="Asuka">
            </h1>
            <div class="jp-name">惣流・アスカ・ラングレー</div>
            
            <p style="color: #aaa; max-width: 400px; line-height: 1.6;" id="trans-desc">
                Designada como la Segunda Niña y piloto de la Unidad Evangelion-02. Una prodigio con un temperamento fogoso y un ratio de sincronización sin igual.
            </p>

            <div class="stats-container">
                <div class="stat-card" data-tilt>
                    <div class="stat-label" id="trans-nat-label">Nacionalidad</div>
                    <div class="stat-value" id="trans-nat-value">Alemana</div>
                </div>
                <div class="stat-card" data-tilt>
                    <div class="stat-label" id="trans-sync-label">Ratio de Sincronización</div>
                    <div class="stat-value">98.2%</div>
                </div>
                <div class="stat-card" data-tilt>
                    <div class="stat-label" id="trans-pers-label">Personalidad</div>
                    <div class="stat-value" id="trans-pers-value">Impulsiva</div>
                </div>
                <div class="stat-card" data-tilt>
                    <div class="stat-label" id="trans-trait-label">Rasgo</div>
                    <div class="stat-value" id="trans-trait-value">Orgullosa</div>
                </div>
            </div>
        </section>

        <section class="hero-panel">
            <button id="unlock-btn" class="interaction-btn" onclick="toggleInteraction()">Unlock Interaction</button>
            <div class="scanline-effect"></div>
            <model-viewer 
                id="asuka-viewer"
                src="/models/azuka_main.glb" 
                auto-rotate 
                interaction-prompt="none"
                shadow-intensity="1"
                environment-image="neutral"
                exposure="1.2"
                camera-orbit="0deg 75deg 105%"
                min-camera-orbit="auto auto 5%"
                max-camera-orbit="auto auto auto"
                loading="eager">
            </model-viewer>





            <div class="hud-details">
                <span id="trans-hud-model">MODEL: ASUKA_SOHRYU_02</span><br>
                <span id="trans-hud-status">STATUS: COMBAT READY</span><br>
                <span id="trans-hud-loc">LOC: NERV HQ</span>
            </div>

        </section>
    </main>

    <script>


        const cards = document.querySelectorAll('.stat-card');
        
        cards.forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 10;
                const rotateY = (centerX - x) / 10;
                
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.05, 1.05, 1.05)`;
            });
            
            card.addEventListener('mouseleave', () => {
                card.style.transform = `perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)`;
            });
        });



        const bg = document.querySelector('.liquid-bg');
        window.addEventListener('mousemove', (e) => {
            const x = e.clientX / window.innerWidth;
            const y = e.clientY / window.innerHeight;
            
            bg.style.transform = `translate(${x * 20}px, ${y * 20}px) scale(1.1)`;
        });



        function toggleInteraction() {
            const viewer = document.getElementById('asuka-viewer');
            const btn = document.getElementById('unlock-btn');
            const currentLang = document.documentElement.lang || 'es';
            
            if (viewer.hasAttribute('camera-controls')) {
                viewer.removeAttribute('camera-controls');
                btn.textContent = translations[currentLang].unlock;
                btn.classList.remove('unlocked');
            } else {
                viewer.setAttribute('camera-controls', '');
                btn.textContent = translations[currentLang].lock;
                btn.classList.add('unlocked');
            }
        }



        const translations = {
            es: {
                subtitle: "Piloto del EVA-02",
                desc: "Designada como la Segunda Niña y piloto de la Unidad Evangelion-02. Una prodigio con un temperamento fogoso y un ratio de sincronización sin igual.",
                nat_label: "Nacionalidad",
                nat_value: "Alemana",
                sync_label: "Ratio de Sincronización",
                pers_label: "Personalidad",
                pers_value: "Impulsiva",
                trait_label: "Rasgo",
                    unlock: "Desbloquear Interacción",
                lock: "Bloquear Interacción",
                hud_model: "MODELO: ASUKA_SOHRYU_02",
                hud_status: "ESTADO: LISTA PARA EL COMBATE",
                hud_loc: "LOC: NERV HQ",
                langName: "Español",
                flag: "https://flagcdn.com/w20/es.png"
            },
            en: {
                subtitle: "EVA-02 Pilot",
                desc: "Designated as the Second Child and the pilot of Evangelion Unit-02. A prodigy with a fiery temperament and unparalleled synch-ratio.",
                nat_label: "Nationality",
                nat_value: "German",
                sync_label: "Sync Ratio",
                pers_label: "Personality",
                pers_value: "Impulsive",
                trait_label: "Trait",
                trait_value: "Prideful",
                unlock: "Unlock Interaction",
                lock: "Lock Interaction",
                hud_model: "MODEL: ASUKA_SOHRYU_02",
                hud_status: "STATUS: COMBAT READY",
                hud_loc: "LOC: NERV HQ",
                langName: "English",
                flag: "https://flagcdn.com/w20/us.png"
            },
            jp: {
                subtitle: "EVA-02 パイロット",
                desc: "エヴァンゲリオン2号機パイロットの第2の適格者。炎のような気性と比類なきシンクロ率を持つ天才。",
                nat_label: "国籍",
                nat_value: "ドイツ",
                sync_label: "シンクロ率",
                pers_label: "性格",
                pers_value: "衝動的",
                trait_label: "特性",
                trait_value: "プライド",
                unlock: "操作ロック解除",
                lock: "操作ロック",
                hud_model: "モデル: ASUKA_SOHRYU_02",
                hud_status: "情勢: 戦闘待機中",
                hud_loc: "場所: ネルフ本部",
                langName: "日本語",
                flag: "https://flagcdn.com/w20/jp.png"
            }
        };

        const flags = {
            es: "https://flagcdn.com/w20/es.png",
            en: "https://flagcdn.com/w20/us.png",
            jp: "https://flagcdn.com/w20/jp.png"
        };



        function changeLang(lang) {
            document.documentElement.lang = lang;
            const t = translations[lang];
            
            document.getElementById('trans-subtitle').textContent = t.subtitle;
            document.getElementById('trans-desc').textContent = t.desc;
            document.getElementById('trans-nat-label').textContent = t.nat_label;
            document.getElementById('trans-nat-value').textContent = t.nat_value;
            document.getElementById('trans-sync-label').textContent = t.sync_label;
            document.getElementById('trans-pers-label').textContent = t.pers_label;
            document.getElementById('trans-pers-value').textContent = t.pers_value;
            document.getElementById('trans-trait-label').textContent = t.trait_label;
            document.getElementById('trans-trait-value').textContent = t.trait_value;

            document.getElementById('trans-hud-model').textContent = t.hud_model;
            document.getElementById('trans-hud-status').textContent = t.hud_status;
            document.getElementById('trans-hud-loc').textContent = t.hud_loc;
            
            const unlockBtn = document.getElementById('unlock-btn');
            const viewer = document.getElementById('asuka-viewer');

            if (viewer.hasAttribute('camera-controls')) {
                unlockBtn.textContent = t.lock;
            } else {
                unlockBtn.textContent = t.unlock;
            }
            
            document.getElementById('current-flag').src = t.flag;
            document.getElementById('current-lang').textContent = t.langName;
        }

        window.addEventListener('load', () => {
            const currentLang = document.documentElement.lang || 'es';
            changeLang(currentLang);
        });

    </script>




</body>
</html>
