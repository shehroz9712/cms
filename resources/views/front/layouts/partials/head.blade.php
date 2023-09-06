<head>


    <meta charset="UTF-8">

    @yield('meta')





    <link rel="shortcut icon" href="{{ uploadsDir('logo/' . $setting->phone) }}">
    <link rel="canonical" href="{{ url()->current() }}">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="{{ frontCss('style.css') }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-JSZ1R2Q07S"></script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-JSZ1R2Q07S');
    </script>
    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End TrustBox script -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "ProfessionalService",
            "name": "Kleinbott",
            "image": "https://kleinbott.com/assets/image/logo/logo.png",
            "@id": "",
            "url": "https://kleinbott.com/",
            "telephone": "+1 646 956 4649",
            "priceRange": "10% less as compare to others",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "447 Broadway, Suite 1596",
                "addressLocality": "Newyork",
                "postalCode": "10013",
                "addressCountry": "NY"
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                    "Sunday"
                ],
                "opens": "08:00",
                "closes": "05:00"
            },
            "sameAs": [
                "https://www.facebook.com/kleinbott",
                "https://twitter.com/kleinbottsocial",
                "https://www.instagram.com/kleinbottsocial/",
                "https://www.linkedin.com/company/kleinbott/"
            ]
        }
    </script>
    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End TrustBox script -->


    @yield('css')
</head>
