<footer class="footer mt-5">
    <div class="container">
        <div class="row">

            <!-- 🌸 ABOUT -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold brand">🌸 CIU News</h5>
                <p class="text-muted">
                    Portal berita terkini yang menyajikan informasi terpercaya seputar teknologi,
                    hiburan, ekonomi, dan gaya hidup.
                </p>
            </div>

            <!-- 🗺️ SITEMAP -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Telusuri</h5>
                <ul class="list-unstyled sitemap">
                    <li><a href="index.php">For You</a></li>
                    <li><a href="#">Hiburan</a></li>
                    <li><a href="#">Gaya Hidup</a></li>
                    <li><a href="#">Teknologi</a></li>
                    <li><a href="#">Olahraga</a></li>
                    <li><a href="#">Ekonomi</a></li>
                    <li><a href="#">Nasional</a></li>
                    <li><a href="#">Internasional</a></li>
                </ul>
            </div>

            <!-- 📍 GOOGLE MAP -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Lokasi Kami</h5>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5264.63540102553!2d108.52847360179055!3d-6.734697339850193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1dfa0caae141%3A0x3b66fb4b842e1140!2sUIN%20Siber%20Syekh%20Nurjati%20Cirebon!5e0!3m2!1sen!2sid!4v1775290479571!5m2!1sen!2sid" 
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>

        </div>

        <hr class="divider">

        <div class="text-center">
            <small>© <?php echo date('Y'); ?> CIU News. All rights reserved.</small>
        </div>
    </div>
</footer>

<style>
.footer {
    background: linear-gradient(135deg, #f8c8dc, #ffe4ec);
    padding: 50px 0 20px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    width: 100vw;
    margin-left: calc(-50vw + 50%);
    box-shadow: 0 -5px 20px rgba(0,0,0,0.05);
}

/* BRAND */
.footer .brand {
    color: #000000;
    font-size: 20px;
}

/* HEAD */
.footer h5 {
    color: #333;
    margin-bottom: 15px;
}

/* LINK */
.footer a {
    text-decoration: none;
    color: #555;
    transition: 0.3s;
    display: inline-block;
}

.footer a:hover {
    color: #d63384;
    transform: translateX(5px);
}

/* SITEMAP */
.sitemap li {
    margin-bottom: 6px;
}

/* MAP */
.map-container {
    overflow: hidden;
    border-radius: 15px;
    transition: 0.3s;
}

.map-container iframe {
    width: 100%;
    height: 200px;
    border-radius: 15px;
}

.map-container:hover {
    transform: scale(1.03);
}

/* DIVIDER */
.divider {
    border-top: 1px solid rgba(0,0,0,0.1);
}

/* TEXT */
.footer small {
    color: #666;
}

/* ANIMASI MASUK */
.footer {
    animation: fadeUp 0.6s ease;
}

@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>