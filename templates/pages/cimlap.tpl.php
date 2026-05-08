<section class="welcome-section">
    <h2>Üdvözöljük a Foci honlapon!</h2>
    <p class="lead-text">Nézd meg a legfrissebb gólokat és bakikat!</p>

    <div class="video-grid">
        <div class="video-item highlight">
            <h4>Történelem: Lewandowski 5 gólja</h4>
            <div class="iframe-container">
                <iframe 
                    src="https://www.youtube.com/embed/fA-n5v_YI7M?rel=0" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>

        <div class="video-item">
            <h4>Vicces focis pillanatok</h4>
            <div class="iframe-container">
                <iframe 
                    src="https://www.youtube.com/embed/5U9u9H-q684?rel=0" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>

<style>
    .welcome-section { text-align: center; }
    .lead-text { font-size: 1.2rem; color: #555; margin-bottom: 30px; }
    .video-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
        gap: 30px; 
        margin-top: 20px; 
    }
    .video-item { 
        background: #fdfdfd; 
        padding: 15px; 
        border-radius: 8px; 
        box-shadow: 0 2px 8px rgba(0,0,0,0.1); 
        transition: transform 0.3s ease;
    }
    .video-item:hover { transform: translateY(-5px); }
    .video-item.highlight { border: 2px solid var(--foci-zold); }
    .video-desc { margin-top: 10px; font-size: 0.9rem; color: #777; font-weight: 500; }
    .iframe-container { position: relative; padding-bottom: 56.25%; height: 0; }
    .iframe-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 4px; }
</style>