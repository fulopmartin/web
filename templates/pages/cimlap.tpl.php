<section class="welcome-section">
    <h2>Üdvözöljük a Foci honlapon!</h2>
    <p class="lead-text">Gólok, bakik és izgalmas pillanatok egy helyen.</p>

    <div class="multimedia-container">
        <h3>Kiemelt Videók</h3>
        <div class="video-grid">
            
            <div class="video-item local-video">
                <h4>Pillanatkép a pályáról</h4>
                <div class="video-wrapper">
                    <video width="100%" controls>
                        <source src="./videos/focividi.mov" type="video/mp4">
                        Az Ön böngészője nem támogatja a videó lejátszását.
                    </video>
                </div>
                <p class="video-desc">Rövid felvétel a saját archívumunkból.</p>
            </div>

            <div class="video-item">
                <h4>Vicces focis pillanatok</h4>
                <div class="iframe-container">
                    <iframe width="100%" height="315" 
                            src="https://www.youtube.com/embed/5U9u9H-q684" 
                            title="Funny Football Moments" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
                <p class="video-desc">Amikor a szerencse elpártol a játékosoktól.</p>
            </div>

        </div>
    </div>
</section>

<style>
    .welcome-section { text-align: center; }
    .lead-text { font-size: 1.1rem; color: #666; margin-bottom: 30px; }
    
    .video-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
        gap: 25px; 
        margin-top: 20px; 
    }
    
    .video-item { 
        background: #fff; 
        padding: 15px; 
        border-radius: 10px; 
        box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
    }

    .video-wrapper, .iframe-container {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        border-radius: 5px;
        background: #000;
    }

    .video-wrapper video, .iframe-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .video-desc { 
        margin-top: 12px; 
        font-size: 0.9rem; 
        color: #777; 
        font-style: italic; 
    }

    @media (max-width: 600px) {
        .video-grid { grid-template-columns: 1fr; }
    }
</style>