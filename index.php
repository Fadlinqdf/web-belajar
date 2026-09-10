<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LOG1 — Logistics Agency Medan</title>
<meta name="description" content="LOG1 adalah agency logistik di Medan yang menyediakan solusi distribusi, delivery, warehouse, dan kebutuhan logistik bisnis secara profesional.">
<meta property="og:title" content="LOG1 — Logistics Agency Medan">
<meta property="og:description" content="Professional logistics partner for modern businesses. Berbasis di Medan, Sumatera Utara.">
<meta property="og:type" content="website">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700;800&family=Inter:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap" rel="stylesheet">

<style>
  /* ============================================================
     TOKENS
     ============================================================ */
  :root{
    --navy-deep:#070f1d;
    --navy:#0c1e38;
    --navy-soft:#122846;
    --charcoal:#1a1d22;
    --orange:#ff5a1f;
    --orange-dim:#c8460f;
    --amber:#ffb020;
    --off-white:#f4f2ec;
    --paper:#eeece4;
    --ink:#12151a;
    --ink-soft:#4a5058;
    --gray:#8d94a0;
    --line-light: rgba(18,21,26,0.12);
    --line-dark: rgba(244,242,236,0.14);

    --f-display:'Manrope', sans-serif;
    --f-body:'Inter', sans-serif;
    --f-mono:'IBM Plex Mono', monospace;

    --container: 1240px;
    --edge: 6vw;
    --ease: cubic-bezier(.16,.84,.28,1);
  }

  *{box-sizing:border-box; margin:0; padding:0;}
  html{scroll-behavior:smooth;}
  body{
    font-family:var(--f-body);
    background:var(--off-white);
    color:var(--ink);
    overflow-x:hidden;
    -webkit-font-smoothing:antialiased;
  }
  img{max-width:100%; display:block; object-fit:cover;}
  a{color:inherit; text-decoration:none;}
  ul{list-style:none;}
  button{font-family:inherit; cursor:pointer; border:none; background:none;}
  section{position:relative;}

  ::selection{background:var(--orange); color:#fff;}

  :focus-visible{
    outline:2px solid var(--orange);
    outline-offset:3px;
  }

  .wrap{
    max-width:var(--container);
    margin:0 auto;
    padding-left:var(--edge);
    padding-right:var(--edge);
  }

  .eyebrow{
    font-family:var(--f-mono);
    font-size:12px;
    letter-spacing:.14em;
    text-transform:uppercase;
    color:var(--orange);
    display:flex;
    align-items:center;
    gap:10px;
  }
  .eyebrow::before{
    content:"";
    width:22px; height:1px;
    background:var(--orange);
    display:inline-block;
  }

  h1,h2,h3,h4{font-family:var(--f-display); font-weight:800; line-height:1.05; letter-spacing:-0.02em;}

  .btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    font-family:var(--f-body);
    font-weight:600;
    font-size:14.5px;
    padding:15px 26px;
    border-radius:2px;
    transition:transform .45s var(--ease), background .3s ease, color .3s ease, box-shadow .3s ease;
    white-space:nowrap;
  }
  .btn svg{transition:transform .35s var(--ease);}
  .btn-primary{
    background:var(--orange);
    color:#fff;
  }
  .btn-primary:hover{
    background:var(--orange-dim);
    transform:translateY(-2px);
    box-shadow:0 14px 30px -12px rgba(255,90,31,.55);
  }
  .btn-primary:hover svg{transform:translate(3px,-3px);}
  .btn-ghost{
    color:var(--off-white);
    border-bottom:1px solid var(--line-dark);
    padding-left:0; padding-right:0; padding-bottom:6px;
  }
  .btn-ghost:hover{border-color:var(--orange); color:var(--orange);}
  .btn-ghost:hover svg{transform:translate(3px,-3px);}
  .btn-ghost-dark{
    color:var(--ink);
    border-bottom:1px solid var(--line-light);
    padding-left:0; padding-right:0; padding-bottom:6px;
  }
  .btn-ghost-dark:hover{border-color:var(--orange); color:var(--orange-dim);}
  .btn-ghost-dark:hover svg{transform:translate(3px,-3px);}

  /* reveal helper (JS toggles .is-visible) */
  .reveal{opacity:0; transform:translateY(28px); transition:opacity .9s var(--ease), transform .9s var(--ease);}
  .reveal.is-visible{opacity:1; transform:none;}

  @media (prefers-reduced-motion: reduce){
    *{animation-duration:.001ms !important; animation-iteration-count:1 !important; transition-duration:.001ms !important; scroll-behavior:auto !important;}
    .reveal{opacity:1; transform:none;}
  }

  /* ============================================================
     SCROLL PROGRESS + ROUTE LINE (signature element)
     ============================================================ */
  .progress-bar{
    position:fixed; top:0; left:0; height:2px; width:100%;
    background:var(--orange);
    transform-origin:left;
    transform:scaleX(0);
    z-index:999;
  }

  .route-rail{
    position:fixed;
    left:34px;
    top:0;
    height:100vh;
    width:1px;
    z-index:40;
    display:none;
    pointer-events:none;
  }
  @media(min-width:1080px){ .route-rail{display:block;} }
  .route-rail__track{
    position:absolute; top:14%; bottom:14%; left:0; width:1px;
    background:rgba(18,21,26,0.14);
  }
  .route-rail__fill{
    position:absolute; top:14%; left:0; width:1px; height:0;
    background:var(--orange);
    transition:height .1s linear;
  }
  .route-rail__wp{
    position:absolute; left:-3px; width:7px; height:7px; border-radius:50%;
    background:var(--off-white); border:1px solid var(--gray);
    transform:translateY(-50%);
  }
  .route-rail__wp.is-past{background:var(--orange); border-color:var(--orange);}
  .route-rail__label{
    position:absolute; left:16px; transform:translateY(-50%);
    font-family:var(--f-mono); font-size:10px; letter-spacing:.08em;
    color:var(--gray); white-space:nowrap; text-transform:uppercase;
  }
  .route-rail__wp.is-past + .route-rail__label{color:var(--ink);}

  /* ============================================================
     CUSTOM CURSOR (desktop only)
     ============================================================ */
  .cursor-dot{
    position:fixed; top:0; left:0; width:8px; height:8px; border-radius:50%;
    background:var(--orange); pointer-events:none; z-index:9999;
    transform:translate(-50%,-50%);
    transition:opacity .2s ease;
    display:none;
    mix-blend-mode:difference;
  }
  .cursor-ring{
    position:fixed; top:0; left:0; width:34px; height:34px; border-radius:50%;
    border:1px solid rgba(255,90,31,.6); pointer-events:none; z-index:9998;
    transform:translate(-50%,-50%);
    transition:width .25s var(--ease), height .25s var(--ease), opacity .2s ease, border-color .25s ease;
    display:none;
  }
  @media(hover:hover) and (pointer:fine){
    .cursor-dot, .cursor-ring{display:block;}
  }
  .cursor-ring.is-active{width:56px; height:56px; border-color:var(--orange);}

  /* ============================================================
     HEADER
     ============================================================ */
  header{
    position:fixed; top:0; left:0; width:100%; z-index:200;
    padding:26px 0;
    transition:padding .4s var(--ease), background .4s var(--ease), box-shadow .4s var(--ease), border-color .4s var(--ease);
    border-bottom:1px solid transparent;
  }
  header.is-scrolled{
    padding:16px 0;
    background:rgba(7,15,29,0.88);
    backdrop-filter:blur(14px);
    border-bottom-color:rgba(244,242,236,0.08);
  }
  .nav{
    display:flex; align-items:center; justify-content:space-between;
  }
  .logo{
    font-family:var(--f-display); font-weight:800; font-size:22px;
    color:var(--off-white); letter-spacing:-0.02em;
    display:flex; align-items:baseline; gap:10px;
  }
  .logo span{color:var(--orange);}
  .logo small{
    font-family:var(--f-mono); font-weight:400; font-size:10.5px;
    letter-spacing:.12em; text-transform:uppercase; color:var(--gray);
  }
  .nav-links{
    display:flex; align-items:center; gap:40px;
  }
  .nav-links a{
    position:relative;
    font-size:14.5px; font-weight:500; color:var(--off-white);
    padding:4px 0;
  }
  .nav-links a::after{
    content:""; position:absolute; left:0; bottom:0; width:100%; height:1px;
    background:var(--orange); transform:scaleX(0); transform-origin:left;
    transition:transform .35s var(--ease);
  }
  .nav-links a:hover::after{transform:scaleX(1);}
  .nav-cta{display:flex; align-items:center; gap:28px;}
  .hamburger{
    display:none; flex-direction:column; gap:5px; width:26px; z-index:210;
  }
  .hamburger span{height:1.5px; width:100%; background:var(--off-white); transition:transform .3s var(--ease), opacity .3s ease;}
  .hamburger.is-open span:nth-child(1){transform:translateY(6.5px) rotate(45deg);}
  .hamburger.is-open span:nth-child(2){opacity:0;}
  .hamburger.is-open span:nth-child(3){transform:translateY(-6.5px) rotate(-45deg);}

  @media(max-width:900px){
    .nav-links{
      position:fixed; inset:0 0 0 auto; width:78%; max-width:360px;
      background:var(--navy-deep); flex-direction:column; align-items:flex-start;
      justify-content:center; gap:30px; padding:0 40px;
      transform:translateX(100%); transition:transform .5s var(--ease);
    }
    .nav-links.is-open{transform:translateX(0);}
    .nav-links a{font-size:22px;}
    .nav-cta .btn-primary{display:none;}
    .hamburger{display:flex;}
  }

  /* ============================================================
     HERO
     ============================================================ */
  .hero{
    min-height:100vh;
    background:
      radial-gradient(1100px 600px at 82% -6%, rgba(255,90,31,.10), transparent 60%),
      linear-gradient(180deg, var(--navy-deep), var(--navy) 70%);
    color:var(--off-white);
    display:flex; align-items:center;
    padding-top:120px; padding-bottom:70px;
    position:relative;
    overflow:hidden;
  }
  .hero::before{
    content:"";
    position:absolute; inset:0;
    background-image:
      linear-gradient(rgba(244,242,236,.05) 1px, transparent 1px),
      linear-gradient(90deg, rgba(244,242,236,.05) 1px, transparent 1px);
    background-size:64px 64px;
    mask-image:linear-gradient(180deg, rgba(0,0,0,.9), transparent 78%);
    pointer-events:none;
  }
  .hero .wrap{
    display:grid; grid-template-columns:1.05fr .95fr; gap:60px; align-items:center;
    position:relative; z-index:2;
  }
  .hero-copy .eyebrow{margin-bottom:26px;}
  .hero h1{
    font-size:clamp(40px,5.4vw,68px);
    margin-bottom:26px;
  }
  .hero h1 em{
    font-style:normal; color:var(--orange);
  }
  .hero-copy p{
    font-size:17.5px; line-height:1.7; color:#c7cdd8;
    max-width:480px; margin-bottom:38px;
  }
  .hero-ctas{display:flex; align-items:center; gap:32px; flex-wrap:wrap; margin-bottom:52px;}
  .hero-trust{
    display:flex; flex-wrap:wrap; gap:26px 34px;
    border-top:1px solid var(--line-dark); padding-top:26px;
  }
  .hero-trust li{
    font-family:var(--f-mono); font-size:11.5px; letter-spacing:.06em; text-transform:uppercase;
    color:var(--gray); display:flex; align-items:center; gap:9px;
  }
  .hero-trust li::before{content:""; width:5px; height:5px; background:var(--orange); border-radius:50%; flex:none;}

  /* --- Hero visual: route / map card --- */
  .hero-visual{
    position:relative; perspective:1400px;
  }
  .route-card{
    position:relative;
    border:1px solid rgba(244,242,236,.14);
    background:linear-gradient(160deg, rgba(244,242,236,.05), rgba(244,242,236,.015));
    border-radius:4px;
    padding:26px;
    transform-style:preserve-3d;
    transform:rotateY(0deg) rotateX(0deg) scale(.97);
    transition:transform .15s ease-out;
    box-shadow:0 40px 90px -30px rgba(0,0,0,.65);
  }
  .route-card__head{
    display:flex; justify-content:space-between; align-items:flex-start;
    font-family:var(--f-mono); font-size:11px; letter-spacing:.08em; text-transform:uppercase;
    color:var(--gray); margin-bottom:18px;
  }
  .route-card__head b{color:var(--off-white); font-weight:500;}
  .route-card__photo{
    position:relative; border-radius:2px; overflow:hidden; height:230px; margin-bottom:20px;
  }
  .route-card__photo img{width:100%; height:100%; object-fit:cover; filter:saturate(.92) contrast(1.05);}
  .route-card__photo::after{
    content:""; position:absolute; inset:0;
    background:linear-gradient(180deg, rgba(7,15,29,0) 40%, rgba(7,15,29,.75));
  }
  .route-map{width:100%; height:auto; display:block;}
  .route-path{
    fill:none; stroke:var(--orange); stroke-width:1.4; stroke-dasharray:6 6;
    opacity:.85;
  }
  .route-dot{
    fill:var(--orange);
    offset-path:path('M8,86 C 60,86 70,20 150,20 S 250,80 292,18');
    animation:travel 5s linear infinite;
  }
  @keyframes travel{
    0%{offset-distance:0%;}
    100%{offset-distance:100%;}
  }
  .route-pin{fill:var(--off-white);}
  .route-label{
    font-family:'IBM Plex Mono', monospace; font-size:7.4px; letter-spacing:.03em; fill:var(--gray);
    text-transform:uppercase;
  }
  .route-label.strong{fill:var(--off-white);}

  .route-card__foot{
    display:flex; justify-content:space-between; align-items:flex-end; margin-top:18px;
    border-top:1px solid rgba(244,242,236,.1); padding-top:18px;
  }
  .route-card__stat b{
    display:block; font-family:var(--f-display); font-size:26px; font-weight:800; color:var(--off-white);
  }
  .route-card__stat span{
    font-family:var(--f-mono); font-size:10px; letter-spacing:.08em; text-transform:uppercase; color:var(--gray);
  }

  .float-chip{
    position:absolute; background:var(--off-white); color:var(--ink);
    padding:12px 16px; border-radius:2px; font-family:var(--f-mono); font-size:11px;
    box-shadow:0 22px 50px -18px rgba(0,0,0,.55);
    display:flex; align-items:center; gap:10px;
    animation:floaty 6s ease-in-out infinite;
  }
  .float-chip b{font-family:var(--f-body); font-weight:600; font-size:12.5px; letter-spacing:0; color:var(--ink);}
  .float-chip .dot-green{width:7px; height:7px; border-radius:50%; background:#28c76f; flex:none;}
  .chip-a{top:-22px; left:-26px; animation-delay:.2s;}
  .chip-b{bottom:20px; right:-30px; animation-delay:1.4s;}
  @keyframes floaty{
    0%,100%{transform:translateY(0);}
    50%{transform:translateY(-10px);}
  }
  @media(max-width:640px){ .float-chip{display:none;} }

  @media(max-width:1000px){
    .hero .wrap{grid-template-columns:1fr; gap:56px;}
    .hero-copy p{max-width:none;}
    .hero{padding-top:130px;}
  }

  /* ============================================================
     SECTION HEADERS (shared)
     ============================================================ */
  .sec{padding:130px 0;}
  .sec-head{
    display:grid; grid-template-columns:1fr 1fr; gap:60px; align-items:end;
    margin-bottom:70px;
  }
  .sec-head h2{font-size:clamp(30px,3.6vw,46px); color:var(--ink); margin-top:20px;}
  .sec-head p{font-size:16px; line-height:1.7; color:var(--ink-soft); max-width:420px;}
  @media(max-width:800px){
    .sec-head{grid-template-columns:1fr; gap:22px;}
    .sec{padding:96px 0;}
  }

  /* ============================================================
     ABOUT
     ============================================================ */
  .about{background:var(--off-white);}
  .about-grid{
    display:grid; grid-template-columns:1fr 1fr; gap:70px;
  }
  .about-copy p{
    font-size:16.5px; line-height:1.8; color:var(--ink-soft); margin-bottom:18px; max-width:480px;
  }
  .stat-list{
    display:grid; grid-template-columns:1fr 1fr; gap:0;
    border-top:1px solid var(--line-light);
  }
  .stat-item{
    padding:30px 26px 30px 0;
    border-bottom:1px solid var(--line-light);
  }
  .stat-item:nth-child(odd){border-right:1px solid var(--line-light); padding-right:26px;}
  .stat-item:nth-child(even){padding-left:26px;}
  .stat-item b{
    display:block; font-family:var(--f-display); font-size:15px; color:var(--orange-dim);
    margin-bottom:10px;
  }
  .stat-item span{display:block; font-size:14.5px; font-weight:600; color:var(--ink);}
  .stat-item small{display:block; font-size:12.5px; color:var(--gray); margin-top:4px;}

  @media(max-width:800px){
    .about-grid{grid-template-columns:1fr; gap:40px;}
  }

  /* ============================================================
     SERVICES
     ============================================================ */
  .services{background:var(--navy-deep); color:var(--off-white);}
  .services .sec-head p{color:#aab2bf;}
  .services .sec-head h2{color:var(--off-white);}
  .services .eyebrow{color:var(--orange);}

  .service-grid{
    display:grid; grid-template-columns:repeat(3,1fr);
    border-top:1px solid var(--line-dark);
    border-left:1px solid var(--line-dark);
  }
  .service-card{
    border-right:1px solid var(--line-dark);
    border-bottom:1px solid var(--line-dark);
    padding:42px 34px;
    position:relative;
    overflow:hidden;
    transition:background .4s ease;
  }
  .service-card:hover{background:rgba(244,242,236,.03);}
  .service-card__top{
    display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:56px;
  }
  .service-card__num{font-family:var(--f-mono); font-size:12px; color:var(--gray);}
  .service-card__icon{
    width:38px; height:38px; border:1px solid var(--line-dark); border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    transition:border-color .35s ease, transform .35s var(--ease);
  }
  .service-card:hover .service-card__icon{border-color:var(--orange); transform:rotate(-8deg);}
  .service-card__icon svg{width:16px; height:16px; stroke:var(--off-white);}
  .service-card h3{
    font-size:20px; margin-bottom:12px; font-weight:700;
  }
  .service-card p{font-size:14.5px; line-height:1.65; color:#aab2bf; margin-bottom:26px; max-width:280px;}
  .service-card__line{
    height:1px; width:0; background:var(--orange); transition:width .5s var(--ease); margin-bottom:16px;
  }
  .service-card:hover .service-card__line{width:44px;}
  .service-card__arrow{
    display:inline-flex; align-items:center; gap:8px; font-size:13px; font-weight:600; color:var(--off-white);
  }
  .service-card__arrow svg{transition:transform .35s var(--ease);}
  .service-card:hover .service-card__arrow svg{transform:translate(4px,-4px);}

  @media(max-width:900px){
    .service-grid{grid-template-columns:1fr;}
  }
  @media(min-width:901px) and (max-width:1180px){
    .service-grid{grid-template-columns:repeat(2,1fr);}
  }

  /* ============================================================
     PORTFOLIO
     ============================================================ */
  .portfolio{background:var(--off-white);}
  .port-grid{
    display:grid; grid-template-columns:repeat(6,1fr); gap:22px;
  }
  .port-item{
    position:relative; overflow:hidden; border-radius:2px; grid-column:span 3;
  }
  .port-item.tall{grid-column:span 4;}
  .port-item.small{grid-column:span 2;}
  .port-item .frame{position:relative; aspect-ratio:4/5; overflow:hidden;}
  .port-item.tall .frame{aspect-ratio:16/11;}
  .port-item.small .frame{aspect-ratio:1/1.15;}
  .port-item img{
    width:100%; height:100%; object-fit:cover;
    transition:transform .8s var(--ease), filter .5s ease;
    filter:saturate(.95);
  }
  .port-item:hover img{transform:scale(1.07);}
  .port-item .overlay{
    position:absolute; inset:0;
    background:linear-gradient(180deg, rgba(7,15,29,0) 45%, rgba(7,15,29,.86));
    display:flex; flex-direction:column; justify-content:flex-end; padding:26px;
    color:#fff;
  }
  .port-item .overlay .cat{
    font-family:var(--f-mono); font-size:10.5px; letter-spacing:.1em; text-transform:uppercase; color:var(--orange);
    margin-bottom:8px; opacity:0; transform:translateY(8px);
    transition:opacity .4s ease .05s, transform .4s ease .05s;
  }
  .port-item .overlay h3{
    font-size:21px; display:flex; align-items:center; justify-content:space-between; gap:10px;
  }
  .port-item .overlay h3 svg{
    flex:none; opacity:0; transform:translate(-6px,6px);
    transition:opacity .4s ease, transform .4s ease;
  }
  .port-item:hover .overlay .cat{opacity:1; transform:none;}
  .port-item:hover .overlay h3 svg{opacity:1; transform:none;}

  @media(max-width:820px){
    .port-grid{grid-template-columns:1fr; gap:20px;}
    .port-item, .port-item.tall, .port-item.small{grid-column:span 1;}
    .port-item .frame, .port-item.tall .frame, .port-item.small .frame{aspect-ratio:4/3;}
  }

  /* ============================================================
     CONTACT
     ============================================================ */
  .contact{
    background:linear-gradient(180deg, var(--navy), var(--navy-deep));
    color:var(--off-white);
  }
  .contact-grid{
    display:grid; grid-template-columns:1fr 1fr; gap:80px;
  }
  .contact h2{
    font-size:clamp(32px,4.4vw,54px); margin:20px 0 22px;
  }
  .contact-copy p{font-size:16.5px; line-height:1.75; color:#b7bec9; max-width:440px; margin-bottom:44px;}
  .contact-info{display:flex; flex-direction:column; gap:26px; border-top:1px solid var(--line-dark); padding-top:30px;}
  .contact-info div span{
    display:block; font-family:var(--f-mono); font-size:11px; letter-spacing:.08em; text-transform:uppercase;
    color:var(--gray); margin-bottom:6px;
  }
  .contact-info div a, .contact-info div p{font-size:16px; font-weight:500;}
  .contact-info div a:hover{color:var(--orange);}

  .form-card{
    background:rgba(244,242,236,.04);
    border:1px solid var(--line-dark);
    padding:38px;
    border-radius:2px;
  }
  .field{margin-bottom:22px;}
  .field label{
    display:block; font-family:var(--f-mono); font-size:11px; letter-spacing:.08em; text-transform:uppercase;
    color:var(--gray); margin-bottom:10px;
  }
  .field input, .field textarea{
    width:100%; background:transparent; border:none; border-bottom:1px solid var(--line-dark);
    color:var(--off-white); font-family:var(--f-body); font-size:15px; padding:10px 2px;
    transition:border-color .3s ease;
  }
  .field input::placeholder, .field textarea::placeholder{color:#5c6472;}
  .field input:focus, .field textarea:focus{border-color:var(--orange); outline:none;}
  .field textarea{resize:vertical; min-height:80px;}
  .field-row{display:grid; grid-template-columns:1fr 1fr; gap:22px;}
  .form-note{
    font-family:var(--f-mono); font-size:11px; color:var(--gray); margin-top:6px; margin-bottom:24px; line-height:1.6;
  }
  .form-submit{width:100%; justify-content:center;}
  .form-status{
    margin-top:16px; font-family:var(--f-mono); font-size:12px; color:var(--amber);
    display:none;
  }
  .form-status.is-shown{display:block;}

  @media(max-width:900px){
    .contact-grid{grid-template-columns:1fr; gap:50px;}
    .field-row{grid-template-columns:1fr;}
  }

  /* ============================================================
     FOOTER
     ============================================================ */
  footer{background:var(--navy-deep); color:var(--off-white); padding:70px 0 30px;}
  .footer-top{
    display:grid; grid-template-columns:1.4fr 1fr 1fr; gap:50px;
    padding-bottom:50px; border-bottom:1px solid var(--line-dark);
    margin-bottom:30px;
  }
  .footer-brand .logo{margin-bottom:16px;}
  .footer-brand p{color:var(--gray); font-size:14.5px; max-width:280px; line-height:1.6;}
  .footer-col h4{
    font-family:var(--f-mono); font-size:11px; letter-spacing:.1em; text-transform:uppercase;
    color:var(--gray); margin-bottom:20px; font-weight:500;
  }
  .footer-col ul{display:flex; flex-direction:column; gap:12px;}
  .footer-col a{font-size:14.5px; color:#d7dbe1; transition:color .25s ease;}
  .footer-col a:hover{color:var(--orange);}
  .footer-bottom{
    display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:14px;
    font-family:var(--f-mono); font-size:11.5px; color:var(--gray);
  }

  @media(max-width:800px){
    .footer-top{grid-template-columns:1fr 1fr; gap:34px;}
    .footer-brand{grid-column:span 2;}
  }
</style>
</head>
<body>

  <div class="progress-bar" id="progressBar"></div>
  <div class="cursor-dot" id="cursorDot"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <nav class="route-rail" id="routeRail" aria-hidden="true">
    <div class="route-rail__track"></div>
    <div class="route-rail__fill" id="railFill"></div>
  </nav>

  <!-- ===================== HEADER ===================== -->
  <header id="siteHeader">
    <div class="wrap nav">
      <a href="#top" class="logo">LOG<span>1</span><small>Logistics Agency</small></a>

      <ul class="nav-links" id="navLinks">
        <li><a href="#top" class="nav-link">Home</a></li>
        <li><a href="#tentang" class="nav-link">Tentang Kami</a></li>
        <li><a href="#layanan" class="nav-link">Layanan</a></li>
        <li><a href="#portofolio" class="nav-link">Portofolio</a></li>
        <li><a href="#kontak" class="nav-link">Kontak</a></li>
      </ul>

      <div class="nav-cta">
        <a href="#kontak" class="btn btn-primary">
          Konsultasi Sekarang
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg>
        </a>
        <button class="hamburger" id="hamburger" aria-label="Buka menu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </header>

  <!-- ===================== HERO ===================== -->
  <section class="hero" id="top">
    <div class="wrap">
      <div class="hero-copy">
        <p class="eyebrow">Professional Logistics Partner</p>
        <h1>Menggerakkan Bisnis.<br>Menghubungkan <em>Setiap</em> Tujuan.</h1>
        <p>LOG1 membantu bisnis mengelola kebutuhan logistik dengan solusi yang lebih cepat, aman, dan efisien — dari gudang hingga garis akhir pengiriman.</p>
        <div class="hero-ctas">
          <a href="#kontak" class="btn btn-primary">
            Konsultasi Sekarang
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg>
          </a>
          <a href="#layanan" class="btn btn-ghost">
            Lihat Layanan
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg>
          </a>
        </div>
        <ul class="hero-trust">
          <li>Based in Medan</li>
          <li>Professional Logistics Partner</li>
          <li>Fast &amp; Reliable</li>
        </ul>
      </div>

      <div class="hero-visual">
        <div class="float-chip chip-a"><span class="dot-green"></span> <b>Shipment aktif</b></div>
        <div class="float-chip chip-b">ETA <b>&nbsp;2 hari</b></div>

        <div class="route-card" id="routeCard">
          <div class="route-card__head">
            <span>Manifest №<b>LG1-0472</b></span>
            <span>Status <b>In Transit</b></span>
          </div>

          <div class="route-card__photo">
            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=900&q=80" alt="Interior gudang logistik dengan rak penyimpanan" onerror="this.parentElement.style.background='linear-gradient(135deg,#122846,#0c1e38)'; this.remove();">
          </div>

          <svg class="route-map" viewBox="0 0 300 100" xmlns="http://www.w3.org/2000/svg">
            <path class="route-path" d="M8,86 C 60,86 70,20 150,20 S 250,80 292,18"/>
            <circle class="route-pin" cx="8" cy="86" r="3.4"/>
            <circle class="route-pin" cx="292" cy="18" r="3.4"/>
            <text class="route-label strong" x="4" y="98">MEDAN · 03.59°N</text>
            <text class="route-label" x="238" y="12" text-anchor="end">DESTINATION</text>
            <circle class="route-dot" r="3.2"/>
          </svg>

          <div class="route-card__foot">
            <div class="route-card__stat">
              <b>24/7</b>
              <span>Live Tracking</span>
            </div>
            <div class="route-card__stat">
              <b>98%</b>
              <span>On-Time Rate</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== TENTANG KAMI ===================== -->
  <section class="sec about" id="tentang">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <p class="eyebrow">Tentang Kami</p>
          <h2>Partner Logistik untuk Bisnis yang Terus Bergerak.</h2>
        </div>
        <p>Kami menerjemahkan kerumitan rantai pasok menjadi sistem yang jelas dan terukur — sehingga tim Anda bisa fokus mengembangkan bisnis, bukan mengejar status pengiriman.</p>
      </div>

      <div class="about-grid">
        <div class="about-copy reveal">
          <p>LOG1 lahir dari kebutuhan nyata bisnis di Medan dan sekitarnya akan partner logistik yang benar-benar memahami tantangan lapangan — mulai dari kepadatan distribusi kota, koordinasi antar-gudang, hingga ekspektasi pelanggan yang terus meningkat.</p>
          <p>Kami menggabungkan pengetahuan lokal dengan sistem kerja yang terstruktur, sehingga setiap pengiriman dapat dipantau, setiap keputusan dapat dipertanggungjawabkan, dan setiap masalah dapat diselesaikan sebelum membesar.</p>
          <p>Bagi kami, logistik bukan sekadar memindahkan barang dari titik A ke titik B — melainkan membangun kepercayaan di setiap titik perjalanan itu.</p>
        </div>

        <div class="stat-list reveal">
          <div class="stat-item">
            <b>01</b>
            <span>Strategic Logistics</span>
            <small>Perencanaan rute &amp; distribusi yang terukur</small>
          </div>
          <div class="stat-item">
            <b>02</b>
            <span>Fast Response</span>
            <small>Koordinasi tim dalam hitungan menit</small>
          </div>
          <div class="stat-item">
            <b>03</b>
            <span>Reliable Service</span>
            <small>Konsistensi pengiriman yang terjaga</small>
          </div>
          <div class="stat-item">
            <b>04</b>
            <span>Medan Based</span>
            <small>Memahami medan &amp; ritme kota secara langsung</small>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== LAYANAN ===================== -->
  <section class="sec services" id="layanan">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <p class="eyebrow">Layanan</p>
          <h2>Solusi Logistik dari Hulu ke Hilir.</h2>
        </div>
        <p>Enam layanan inti yang dirancang agar operasional logistik bisnis Anda berjalan lebih rapi, cepat, dan dapat diandalkan.</p>
      </div>

      <div class="service-grid">

        <div class="service-card reveal">
          <div class="service-card__top">
            <span class="service-card__num">01</span>
            <span class="service-card__icon"><svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="13" rx="1"/><path d="M8 7V4h8v3"/></svg></span>
          </div>
          <h3>Logistics Management</h3>
          <p>Pengelolaan kebutuhan logistik secara terstruktur dan efisien, dari perencanaan hingga eksekusi.</p>
          <div class="service-card__line"></div>
          <a href="#kontak" class="service-card__arrow">Pelajari lebih lanjut <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg></a>
        </div>

        <div class="service-card reveal">
          <div class="service-card__top">
            <span class="service-card__num">02</span>
            <span class="service-card__icon"><svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="6" cy="19" r="2"/><circle cx="18" cy="19" r="2"/><path d="M2 6h13v11M8 19h8M15 10h5l2 4v5h-3"/></svg></span>
          </div>
          <h3>Distribution</h3>
          <p>Membantu proses distribusi agar lebih cepat, terorganisir, dan mudah dipantau di setiap titik.</p>
          <div class="service-card__line"></div>
          <a href="#kontak" class="service-card__arrow">Pelajari lebih lanjut <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg></a>
        </div>

        <div class="service-card reveal">
          <div class="service-card__top">
            <span class="service-card__num">03</span>
            <span class="service-card__icon"><svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8l-9-5-9 5 9 5 9-5z"/><path d="M3 8v8l9 5 9-5V8"/><path d="M12 13v8"/></svg></span>
          </div>
          <h3>Cargo &amp; Delivery</h3>
          <p>Solusi pengiriman untuk berbagai kebutuhan bisnis, dari skala kecil hingga volume besar.</p>
          <div class="service-card__line"></div>
          <a href="#kontak" class="service-card__arrow">Pelajari lebih lanjut <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg></a>
        </div>

        <div class="service-card reveal">
          <div class="service-card__top">
            <span class="service-card__num">04</span>
            <span class="service-card__icon"><svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-6 9 6v11a1 1 0 01-1 1h-5v-7H9v7H4a1 1 0 01-1-1V9z"/></svg></span>
          </div>
          <h3>Warehouse Support</h3>
          <p>Dukungan pengelolaan dan koordinasi kebutuhan warehouse secara rapi dan terpantau.</p>
          <div class="service-card__line"></div>
          <a href="#kontak" class="service-card__arrow">Pelajari lebih lanjut <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg></a>
        </div>

        <div class="service-card reveal">
          <div class="service-card__top">
            <span class="service-card__num">05</span>
            <span class="service-card__icon"><svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round"><circle cx="5" cy="6" r="2"/><circle cx="19" cy="18" r="2"/><path d="M7 6h8a4 4 0 014 4v0a4 4 0 01-4 4H9a4 4 0 00-4 4"/></svg></span>
          </div>
          <h3>Supply Chain Support</h3>
          <p>Membantu bisnis mengoptimalkan alur supply chain agar lebih efisien dan minim hambatan.</p>
          <div class="service-card__line"></div>
          <a href="#kontak" class="service-card__arrow">Pelajari lebih lanjut <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg></a>
        </div>

        <div class="service-card reveal">
          <div class="service-card__top">
            <span class="service-card__num">06</span>
            <span class="service-card__icon"><svg viewBox="0 0 24 24" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2l3 6 6 1-4.5 4.2L18 20l-6-3.5L6 20l1.5-6.8L3 9l6-1z"/></svg></span>
          </div>
          <h3>Custom Logistics</h3>
          <p>Solusi logistik yang disesuaikan dengan kebutuhan spesifik dan skala bisnis Anda.</p>
          <div class="service-card__line"></div>
          <a href="#kontak" class="service-card__arrow">Pelajari lebih lanjut <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg></a>
        </div>

      </div>
    </div>
  </section>

  <!-- ===================== PORTOFOLIO ===================== -->
  <section class="sec portfolio" id="portofolio">
    <div class="wrap">
      <div class="sec-head">
        <div>
          <p class="eyebrow">Portofolio</p>
          <h2>Beberapa Rute yang Sudah Kami Jalankan.</h2>
        </div>
        <p>Sebagian proyek yang menggambarkan cakupan kerja LOG1 di berbagai jenis kebutuhan logistik.</p>
      </div>

      <div class="port-grid">
        <a href="#kontak" class="port-item tall reveal">
          <div class="frame">
            <img src="https://images.unsplash.com/photo-1519003722824-194d4455a60c?auto=format&fit=crop&w=1200&q=80" alt="Peti kemas kargo dilihat dari atas" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1580674285054-bed31e145f59?auto=format&fit=crop&w=1200&q=80'">
            <div class="overlay">
              <span class="cat">Retail Logistics</span>
              <h3>Distribution Network <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg></h3>
            </div>
          </div>
        </a>

        <a href="#kontak" class="port-item small reveal">
          <div class="frame">
            <img src="https://images.unsplash.com/photo-1524522173746-f628baad3644?auto=format&fit=crop&w=900&q=80" alt="Truk pengiriman di jalan raya" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1601584115197-04ecc0da31d7?auto=format&fit=crop&w=900&q=80'">
            <div class="overlay">
              <span class="cat">Commercial Logistics</span>
              <h3>Regional Delivery <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg></h3>
            </div>
          </div>
        </a>

        <a href="#kontak" class="port-item reveal">
          <div class="frame">
            <img src="https://images.unsplash.com/photo-1553413077-190083ec01e6?auto=format&fit=crop&w=1000&q=80" alt="Tumpukan peti kemas di area gudang" loading="lazy" onerror="this.src='https://images.unsplash.com/photo-1512428813834-c702c7702b78?auto=format&fit=crop&w=1000&q=80'">
            <div class="overlay">
              <span class="cat">Supply Chain</span>
              <h3>Warehouse Operations <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg></h3>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>

  <!-- ===================== CONTACT ===================== -->
  <section class="sec contact" id="kontak">
    <div class="wrap contact-grid">
      <div class="contact-copy">
        <p class="eyebrow">Kontak Kami</p>
        <h2>Siap Menggerakkan Bisnis Anda?</h2>
        <p>Ceritakan kebutuhan logistik bisnis Anda dan tim LOG1 akan membantu menemukan solusi yang tepat — cepat direspons, jelas prosesnya.</p>

        <div class="contact-info reveal">
          <div>
            <span>Lokasi</span>
            <p>Medan, Sumatera Utara, Indonesia</p>
          </div>
          <div>
            <span>WhatsApp</span>
            <a href="https://wa.me/62xxxxxxxxxx" target="_blank" rel="noopener">+62 xxx xxxx xxxx</a>
          </div>
          <div>
            <span>Email</span>
            <a href="mailto:hello@log1.id">hello@log1.id</a>
          </div>
        </div>
      </div>

      <form class="form-card reveal" id="contactForm" novalidate>
        <div class="field-row">
          <div class="field">
            <label for="f-name">Nama</label>
            <input type="text" id="f-name" name="name" placeholder="Nama lengkap" required>
          </div>
          <div class="field">
            <label for="f-company">Perusahaan</label>
            <input type="text" id="f-company" name="company" placeholder="Nama perusahaan">
          </div>
        </div>
        <div class="field">
          <label for="f-email">Email</label>
          <input type="email" id="f-email" name="email" placeholder="nama@perusahaan.com" required>
        </div>
        <div class="field">
          <label for="f-need">Kebutuhan</label>
          <input type="text" id="f-need" name="need" placeholder="Mis. Distribusi, Warehouse, Cargo">
        </div>
        <div class="field">
          <label for="f-message">Pesan</label>
          <textarea id="f-message" name="message" placeholder="Ceritakan kebutuhan logistik Anda secara singkat" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary form-submit">
          Kirim Permintaan
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M17 7H8M17 7v9"/></svg>
        </button>
        <p class="form-note">* Formulir ini merupakan tampilan antarmuka. Belum terhubung ke sistem pengiriman data — silakan hubungi kami langsung via WhatsApp atau email untuk respons cepat.</p>
        <p class="form-status" id="formStatus">Terima kasih — pesan Anda tercatat di layar ini. Untuk respons langsung, silakan hubungi kami via WhatsApp atau email di atas.</p>
      </form>
    </div>
  </section>

  <!-- ===================== FOOTER ===================== -->
  <footer>
    <div class="wrap">
      <div class="footer-top">
        <div class="footer-brand">
          <a href="#top" class="logo">LOG<span>1</span></a>
          <p>Moving Business Forward. Partner logistik profesional untuk bisnis modern, berbasis di Medan.</p>
        </div>
        <div class="footer-col">
          <h4>Navigasi</h4>
          <ul>
            <li><a href="#top">Home</a></li>
            <li><a href="#tentang">Tentang Kami</a></li>
            <li><a href="#layanan">Layanan</a></li>
            <li><a href="#portofolio">Portofolio</a></li>
            <li><a href="#kontak">Kontak</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Terhubung</h4>
          <ul>
            <li><a href="#" target="_blank" rel="noopener">Instagram</a></li>
            <li><a href="#" target="_blank" rel="noopener">LinkedIn</a></li>
            <li><a href="https://wa.me/62xxxxxxxxxx" target="_blank" rel="noopener">WhatsApp</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <span>© 2026 LOG1. All rights reserved.</span>
        <span>Medan, Sumatera Utara — 03.5952° N, 98.6722° E</span>
      </div>
    </div>
  </footer>

<script>
(function(){
  "use strict";
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- Header scroll state ---------- */
  var header = document.getElementById('siteHeader');
  var progressBar = document.getElementById('progressBar');
  var railFill = document.getElementById('railFill');

  function onScroll(){
    var y = window.scrollY || document.documentElement.scrollTop;
    header.classList.toggle('is-scrolled', y > 40);

    var doc = document.documentElement;
    var scrollTop = doc.scrollTop || document.body.scrollTop;
    var scrollHeight = (doc.scrollHeight - doc.clientHeight) || 1;
    var pct = Math.min(scrollTop / scrollHeight, 1);
    progressBar.style.transform = 'scaleX(' + pct + ')';

    if(railFill){
      var railTrack = document.querySelector('.route-rail__track');
      if(railTrack){
        var h = railTrack.getBoundingClientRect().height;
        railFill.style.height = (pct * h) + 'px';
      }
    }
    updateWaypoints(pct);
  }
  window.addEventListener('scroll', onScroll, {passive:true});

  /* ---------- Route rail waypoints ---------- */
  var railSections = [
    {id:'top', label:'Home'},
    {id:'tentang', label:'Tentang Kami'},
    {id:'layanan', label:'Layanan'},
    {id:'portofolio', label:'Portofolio'},
    {id:'kontak', label:'Kontak'}
  ];
  var rail = document.getElementById('routeRail');
  var railTrackEl = rail ? rail.querySelector('.route-rail__track') : null;

  function buildRail(){
    if(!rail) return;
    railSections.forEach(function(s, i){
      var wp = document.createElement('div');
      wp.className = 'route-rail__wp';
      wp.style.top = (14 + (i/(railSections.length-1))*72) + '%';
      wp.dataset.id = s.id;
      var lb = document.createElement('div');
      lb.className = 'route-rail__label';
      lb.style.top = wp.style.top;
      lb.textContent = s.label;
      rail.appendChild(wp);
      rail.appendChild(lb);
    });
  }
  buildRail();

  function updateWaypoints(){
    var wps = rail ? rail.querySelectorAll('.route-rail__wp') : [];
    var current = 'top';
    railSections.forEach(function(s){
      var el = document.getElementById(s.id);
      if(el && el.getBoundingClientRect().top < window.innerHeight * 0.5){
        current = s.id;
      }
    });
    var reached = true;
    wps.forEach(function(wp){
      if(wp.dataset.id === current) reached = false;
      wp.classList.toggle('is-past', reached || wp.dataset.id === current);
    });
  }

  /* ---------- Mobile nav ---------- */
  var hamburger = document.getElementById('hamburger');
  var navLinks = document.getElementById('navLinks');
  hamburger.addEventListener('click', function(){
    var open = navLinks.classList.toggle('is-open');
    hamburger.classList.toggle('is-open', open);
    hamburger.setAttribute('aria-expanded', open);
  });
  document.querySelectorAll('.nav-link').forEach(function(a){
    a.addEventListener('click', function(){
      navLinks.classList.remove('is-open');
      hamburger.classList.remove('is-open');
      hamburger.setAttribute('aria-expanded', false);
    });
  });

  /* ---------- Reveal on scroll ---------- */
  if('IntersectionObserver' in window){
    var io = new IntersectionObserver(function(entries){
      entries.forEach(function(entry, i){
        if(entry.isIntersecting){
          setTimeout(function(){ entry.target.classList.add('is-visible'); }, (i % 6) * 90);
          io.unobserve(entry.target);
        }
      });
    }, {threshold:0.15, rootMargin:'0px 0px -8% 0px'});
    document.querySelectorAll('.reveal').forEach(function(el){ io.observe(el); });
  } else {
    document.querySelectorAll('.reveal').forEach(function(el){ el.classList.add('is-visible'); });
  }

  /* ---------- Hero load-in sequence ---------- */
  window.addEventListener('DOMContentLoaded', function(){
    if(reduceMotion) return;
    var items = [
      {sel:'.eyebrow', d:'.05s'},
      {sel:'.hero h1', d:'.15s'},
      {sel:'.hero-copy p', d:'.3s'},
      {sel:'.hero-ctas', d:'.42s'},
      {sel:'.hero-trust', d:'.55s'}
    ];
    document.querySelectorAll('.hero-copy > *').forEach(function(el){
      el.style.opacity = '0';
      el.style.transform = 'translateY(18px)';
      el.style.transition = 'opacity .8s cubic-bezier(.16,.84,.28,1), transform .8s cubic-bezier(.16,.84,.28,1)';
    });
    var delay = 60;
    document.querySelectorAll('.hero-copy > *').forEach(function(el, i){
      setTimeout(function(){
        el.style.opacity = '1';
        el.style.transform = 'none';
      }, 150 + i*140);
    });

    var visual = document.querySelector('.hero-visual');
    if(visual){
      visual.style.opacity = '0';
      visual.style.transform = 'scale(.94)';
      visual.style.transition = 'opacity 1s cubic-bezier(.16,.84,.28,1), transform 1s cubic-bezier(.16,.84,.28,1)';
      setTimeout(function(){
        visual.style.opacity = '1';
        visual.style.transform = 'none';
      }, 260);
    }
  });

  /* ---------- 3D tilt on hero card (mouse) ---------- */
  var card = document.getElementById('routeCard');
  var visualWrap = document.querySelector('.hero-visual');
  if(card && visualWrap && !reduceMotion && window.matchMedia('(hover:hover) and (pointer:fine)').matches){
    visualWrap.addEventListener('mousemove', function(e){
      var rect = visualWrap.getBoundingClientRect();
      var x = (e.clientX - rect.left) / rect.width - 0.5;
      var y = (e.clientY - rect.top) / rect.height - 0.5;
      card.style.transform = 'rotateY(' + (x*6) + 'deg) rotateX(' + (y*-6) + 'deg) scale(1)';
    });
    visualWrap.addEventListener('mouseleave', function(){
      card.style.transform = 'rotateY(0deg) rotateX(0deg) scale(.97)';
    });
  }

  /* ---------- Custom cursor ---------- */
  var dot = document.getElementById('cursorDot');
  var ring = document.getElementById('cursorRing');
  if(window.matchMedia('(hover:hover) and (pointer:fine)').matches){
    var rx=0, ry=0, dx=0, dy=0;
    window.addEventListener('mousemove', function(e){
      dot.style.left = e.clientX + 'px';
      dot.style.top = e.clientY + 'px';
      dx = e.clientX; dy = e.clientY;
    });
    (function loop(){
      rx += (dx-rx)*0.18; ry += (dy-ry)*0.18;
      ring.style.left = rx + 'px';
      ring.style.top = ry + 'px';
      requestAnimationFrame(loop);
    })();
    document.querySelectorAll('a, button, input, textarea').forEach(function(el){
      el.addEventListener('mouseenter', function(){ ring.classList.add('is-active'); });
      el.addEventListener('mouseleave', function(){ ring.classList.remove('is-active'); });
    });
  }

  /* ---------- Contact form (UI only, no backend) ---------- */
  var form = document.getElementById('contactForm');
  var status = document.getElementById('formStatus');
  form.addEventListener('submit', function(e){
    e.preventDefault();
    status.classList.add('is-shown');
    form.querySelectorAll('input, textarea').forEach(function(f){ f.value=''; });
  });

  onScroll();
})();
</script>

</body>
</html>