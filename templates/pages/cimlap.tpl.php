<section class="welcome-section">
    <h2>Üdvözöljük a Foci honlapon!</h2>
    <p class="lead-text">Gólok, bakik és minden, ami labdarúgás.</p>

    <div class="multimedia-container">
        <div class="video-grid">
            <div class="video-item local-video">
                <h4>Pillanatkép a pályáról</h4>
                <div class="video-wrapper">
                    <video width="100%" controls>
                        <source src="./videos/focividi.mov">
                        Böngészője nem támogatja a videót.
                    </video>
                </div>
            </div>

            <div class="video-item">
                <h4>Vicces focis pillanatok</h4>
                <div class="iframe-container">
                    <iframe width="100%" height="315" 
                            src="https://www.youtube.com/embed/5U9u9H-q684" 
                            frameborder="0" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <div class="home-contact-info">
        <div class="info-columns">
            <div class="contact-details">
                <h3>Elérhetőségeink</h3>
                <p><strong>Cím:</strong> Kecskemét, Csabay Géza krt. 1/a, 6000.</p>
                <p><strong>Telefon:</strong> +36 1 234 5678</p>
                <p><strong>E-mail:</strong> info@focihonlap.hu</p>
                <p><em>Keressen minket bizalommal!</em></p>
            </div>
            <div class="map-box">
                <h3>Itt találsz meg minket</h3>
                <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2726.0911301017504!2d19.665775777356004!3d46.90092613643956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4743da6a2192a473%3A0xa296982051de5da4!2zU3rDqWt0w7MgU3RhZGl1bQ!5e0!3m2!1sen!2shu!4v1778276955271!5m2!1sen!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .welcome-section { text-align: center; }
    .lead-text { font-size: 1.1rem; color: #666; margin-bottom: 20px; }
    
    .video-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); 
        gap: 20px; 
        margin-bottom: 40px; 
    }
    
    .video-item { background: #fff; padding: 10px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
    .video-wrapper, .iframe-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; }
    .video-wrapper video, .iframe-container iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border-radius: 4px; }

    .home-contact-info {
        margin-top: 30px;
        padding: 20px;
        background: #f1f2f6;
        border-radius: 10px;
        border-top: 4px solid var(--foci-zold);
    }

    .info-columns {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        text-align: left;
    }

    .contact-details, .map-box {
        flex: 1;
        min-width: 280px;
    }

    .google-map {
        border: 2px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        line-height: 0;
    }

    @media (max-width: 768px) {
        .info-columns { flex-direction: column; }
    }
</style>