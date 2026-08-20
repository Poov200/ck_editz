<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>KSG Technologies — Fire & Safety Solutions · Chennai</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;500&family=Roboto:wght@100;300;400&family=Caveat:wght@400;500&display=swap">
<style>
  :root{
    --bg:#f2ede7;
    --text:#161616;
    --text-emp:#333;
    --text-mute:#535353;
    --text-faint:#b1b1b1;
    --line:#e5e5e5;
    --inverse:#ffffff;
    --ease-quiet:cubic-bezier(.22,1,.36,1);
    --ease-precise:cubic-bezier(.4,0,.2,1);
    --ease-emphasis:cubic-bezier(.16,1,.3,1);
  }
  *{margin:0;padding:0;box-sizing:border-box}
  html,body{background:var(--bg);color:var(--text);font-family:'Roboto',sans-serif;font-weight:300;-webkit-font-smoothing:antialiased;overflow-x:hidden}
  body{cursor:none}
  @media (pointer:coarse){body{cursor:auto}}
  img{display:block;max-width:100%}
  a{color:inherit;text-decoration:none}
  ::selection{background:#161616;color:#f2ede7}

  /* === noise overlay === */
  .noise-overlay{
    position:fixed;inset:0;pointer-events:none;z-index:9999;opacity:.035;
    background-image:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200'><filter id='n'><feTurbulence baseFrequency='0.9' numOctaves='2'/></filter><rect width='100%' height='100%' filter='url(%23n)' opacity='0.6'/></svg>");
    animation:noise 20s linear infinite;
  }
  @keyframes noise{
    0%,100%{transform:translate(0,0)}
    20%{transform:translate(-10%,5%)}
    50%{transform:translate(-10%,5%)}
    80%{transform:translate(-15%,0)}
  }

  /* === cursor === */
  .cursor-dot,.cursor-ring{position:fixed;top:0;left:0;pointer-events:none;z-index:10000;mix-blend-mode:difference;opacity:0;transition:opacity .2s ease-out;will-change:transform}
  .cursor-dot{width:6px;height:6px;background:rgba(255,255,255,.85);border-radius:50%}
  .cursor-ring{width:32px;height:32px;border:1px solid rgba(255,255,255,.5);border-radius:50%;transition:opacity .2s ease-out,width .3s ease-out,height .3s ease-out}
  .cursor-dot.is-visible,.cursor-ring.is-visible{opacity:1}
  @media (pointer:coarse){.cursor-dot,.cursor-ring{display:none}}

  /* === nav === */
  .nav{position:fixed;top:0;left:0;right:0;z-index:100;padding:1.6rem 2rem;display:flex;align-items:center;justify-content:space-between;mix-blend-mode:difference;color:#fff}
  .nav__brand{font-family:'Oswald',sans-serif;font-weight:500;font-size:1.05rem;letter-spacing:.18em;text-transform:uppercase}
  .nav__brand span{font-weight:200}
  .nav__menu{display:flex;gap:2.5rem;font-size:.7rem;letter-spacing:.22em;text-transform:uppercase;font-weight:400}
  .nav__menu a{transition:opacity .3s var(--ease-precise);opacity:.7}
  .nav__menu a:hover{opacity:1}
  .nav__phone{font-family:'Oswald',sans-serif;font-weight:300;font-size:.95rem;letter-spacing:.08em}
  @media(max-width:880px){.nav__menu{display:none}.nav__phone{font-size:.78rem}}

  /* === hero === */
  .hero{min-height:100vh;position:relative;display:flex;flex-direction:column;justify-content:flex-end;padding:8rem 2rem 5rem;overflow:hidden}
  .hero__watermark{position:absolute;top:18vh;left:-2vw;font-family:'Oswald',sans-serif;font-weight:200;font-size:34vw;line-height:.8;color:#161616;opacity:.05;letter-spacing:-.04em;pointer-events:none;user-select:none}
  .hero__top{position:absolute;top:8rem;left:2rem;right:2rem;display:flex;justify-content:space-between;align-items:flex-start;font-size:.7rem;letter-spacing:.22em;text-transform:uppercase;color:var(--text-mute)}
  .hero__top-left{max-width:240px;line-height:1.7}
  .hero__top-right{text-align:right;line-height:1.7}
  .hero__eyebrow{font-size:.7rem;letter-spacing:.28em;text-transform:uppercase;color:var(--text-mute);margin-bottom:2rem;display:flex;align-items:center;gap:1rem}
  .hero__eyebrow::before{content:"";width:48px;height:1px;background:var(--text-mute)}
  .hero__title{font-family:'Oswald',sans-serif;font-weight:200;font-size:clamp(3rem,11vw,11rem);line-height:.92;letter-spacing:-.02em;max-width:1400px}
  .hero__title .italic{font-style:italic;font-weight:300}
  .line-mask{overflow:hidden;display:block}
  .line{display:block;transform:translateY(110%);will-change:transform}
  .hero__meta{display:flex;justify-content:space-between;align-items:flex-end;margin-top:5rem;gap:2rem;flex-wrap:wrap}
  .hero__sub{max-width:480px;font-size:1rem;line-height:1.6;color:var(--text-emp);font-weight:300}
  .hero__scroll{font-size:.65rem;letter-spacing:.28em;text-transform:uppercase;color:var(--text-mute);display:flex;align-items:center;gap:.8rem}
  .hero__scroll::after{content:"";width:1px;height:48px;background:var(--text-mute);display:inline-block;animation:scrollLine 2s var(--ease-quiet) infinite}
  @keyframes scrollLine{0%{transform:scaleY(0);transform-origin:top}50%{transform:scaleY(1);transform-origin:top}50.01%{transform:scaleY(1);transform-origin:bottom}100%{transform:scaleY(0);transform-origin:bottom}}
  @media(max-width:768px){.hero__top{display:none}.hero__title{font-size:18vw}}

  /* === marquee === */
  .marquee{border-top:1px solid var(--line);border-bottom:1px solid var(--line);padding:1.2rem 0;overflow:hidden;white-space:nowrap;font-family:'Oswald',sans-serif;font-weight:300;font-size:1.1rem;letter-spacing:.18em;text-transform:uppercase;color:var(--text-emp)}
  .marquee__track{display:inline-block;animation:marquee 50s linear infinite}
  .marquee__track span{margin:0 2.5rem;opacity:.7}
  .marquee__track span.dot{color:var(--text-faint);margin:0 1rem}
  @keyframes marquee{from{transform:translateX(0)}to{transform:translateX(-50%)}}

  /* === sections === */
  section{padding:8rem 2rem;position:relative}
  @media(max-width:768px){section{padding:5rem 1.5rem}}
  .container{max-width:1400px;margin:0 auto}
  .container-narrow{max-width:860px;margin:0 auto}
  .eyebrow{font-size:.7rem;letter-spacing:.28em;text-transform:uppercase;color:var(--text-mute);margin-bottom:2.5rem;display:flex;align-items:center;gap:1rem;font-weight:400}
  .eyebrow::before{content:"";width:32px;height:1px;background:var(--text-mute)}
  .section-title{font-family:'Oswald',sans-serif;font-weight:200;font-size:clamp(2.2rem,5.5vw,5rem);line-height:1;letter-spacing:-.01em;margin-bottom:4rem}
  .section-title .italic{font-style:italic;font-weight:300}

  /* === fade up === */
  .fade-up{opacity:0;transform:translateY(40px);transition:opacity 1.2s var(--ease-quiet),transform 1.2s var(--ease-quiet);will-change:transform,opacity}
  .fade-up.is-in{opacity:1;transform:none}

  /* === manifesto === */
  .manifesto{padding:10rem 2rem}
  .manifesto__label{font-size:.7rem;letter-spacing:.28em;text-transform:uppercase;color:var(--text-mute);margin-bottom:3rem;display:flex;align-items:center;gap:1rem;font-weight:400}
  .manifesto__label::before{content:"";width:32px;height:1px;background:var(--text-mute)}
  .manifesto__text{font-family:'Oswald',sans-serif;font-weight:200;font-size:clamp(1.8rem,3.6vw,3.2rem);line-height:1.25;letter-spacing:-.005em;color:var(--text)}
  .manifesto__text .word{display:inline-block;opacity:0;filter:blur(12px) brightness(40%);will-change:filter,opacity}
  .manifesto__sign{margin-top:4rem;display:flex;justify-content:space-between;align-items:flex-end;border-top:1px solid var(--line);padding-top:2rem;flex-wrap:wrap;gap:1rem}
  .manifesto__sign-name{font-family:'Caveat',cursive;font-size:1.6rem;color:var(--text-emp)}
  .manifesto__sign-role{font-size:.7rem;letter-spacing:.22em;text-transform:uppercase;color:var(--text-mute)}

  /* === stats strip === */
  .stats{border-top:1px solid var(--line);border-bottom:1px solid var(--line);padding:5rem 2rem}
  .stats__grid{display:grid;grid-template-columns:repeat(4,1fr);gap:2rem;max-width:1400px;margin:0 auto}
  .stat{display:flex;flex-direction:column;gap:.6rem}
  .stat__num{font-family:'Oswald',sans-serif;font-weight:200;font-size:clamp(3rem,6vw,5rem);line-height:.9;letter-spacing:-.02em}
  .stat__num sup{font-size:.4em;font-weight:300;vertical-align:top;margin-left:.2em;color:var(--text-mute)}
  .stat__label{font-size:.7rem;letter-spacing:.22em;text-transform:uppercase;color:var(--text-mute);line-height:1.6}
  @media(max-width:768px){.stats__grid{grid-template-columns:repeat(2,1fr);gap:3rem 2rem}}

  /* === scrapbook (scattered postcards) === */
  .scrapbook-wrap{padding:8rem 2rem 10rem}
  .scrapbook{position:relative;perspective:2000px;min-height:880px;max-width:1400px;margin:0 auto}
  .polaroid{position:absolute;width:260px;background:#fff;padding:14px 14px 48px;box-shadow:0 22px 30px -8px rgba(0,0,0,.14),0 6px 12px -4px rgba(0,0,0,.08);transition:transform .65s var(--ease-emphasis),box-shadow .65s var(--ease-quiet);transform-origin:center center;cursor:none}
  .polaroid img{width:100%;aspect-ratio:3/4;object-fit:cover;filter:grayscale(.15) contrast(1.02)}
  .polaroid__cap{margin-top:12px;font-family:'Caveat',cursive;font-size:1.15rem;text-align:center;color:#333;line-height:1.2}
  .polaroid__cap small{display:block;font-family:'Roboto',sans-serif;font-size:.6rem;letter-spacing:.22em;text-transform:uppercase;color:var(--text-faint);margin-top:.4rem;font-weight:400}
  .polaroid:hover{z-index:20;transform:rotate(0deg) scale(1.06)!important;box-shadow:0 40px 56px -12px rgba(0,0,0,.22),0 12px 20px -6px rgba(0,0,0,.12)}
  @media(max-width:880px){
    .scrapbook{min-height:auto;display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;perspective:none}
    .polaroid{position:relative;width:auto;top:auto!important;left:auto!important;right:auto!important;transform:none!important}
    .polaroid:hover{transform:scale(1.02)!important}
  }

  /* === mosaic === */
  .mosaic{display:grid;grid-template-columns:repeat(4,1fr);gap:8px;max-width:1600px;margin:0 auto}
  .mosaic-tile{position:relative;overflow:hidden;cursor:none;aspect-ratio:3/4;background:#161616}
  .mosaic-tile__image{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;filter:grayscale(100%) contrast(1.05);transition:filter .9s var(--ease-emphasis),transform .9s var(--ease-emphasis),opacity .6s ease;opacity:.85}
  .mosaic-tile:hover .mosaic-tile__image{filter:grayscale(0%) contrast(1);transform:scale(1.08);opacity:1}
  .mosaic.has-hover .mosaic-tile:not(:hover) .mosaic-tile__image{opacity:.4;transform:scale(.98)}
  .mosaic-tile__meta{position:absolute;left:0;right:0;bottom:0;padding:1.5rem 1.2rem;color:#fff;z-index:2}
  .mosaic-tile__num{font-family:'Oswald',sans-serif;font-weight:300;font-size:.7rem;letter-spacing:.18em;color:rgba(255,255,255,.65);margin-bottom:.4rem}
  .mosaic-tile__title{font-family:'Oswald',sans-serif;font-weight:300;font-size:1.4rem;line-height:1.1;letter-spacing:-.01em}
  .mosaic-tile__overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,.7) 0%,rgba(0,0,0,0) 60%);z-index:1;transition:opacity .6s var(--ease-quiet)}
  .mosaic.has-hover .mosaic-tile:not(:hover) .mosaic-tile__overlay{opacity:.5}
  @media(max-width:880px){.mosaic{grid-template-columns:repeat(2,1fr)}}

  /* === services list === */
  .services{padding:8rem 2rem}
  .services__header{display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:5rem;gap:2rem;flex-wrap:wrap}
  .services__intro{max-width:380px;font-size:.95rem;line-height:1.6;color:var(--text-emp)}
  .services__list{border-top:1px solid var(--line)}
  .service-row{display:grid;grid-template-columns:80px 1fr 1.4fr 120px;gap:2.5rem;align-items:center;padding:2.2rem 1.5rem;border-bottom:1px solid var(--line);position:relative;transition:padding-left .6s var(--ease-quiet)}
  .service-row::before{content:"";position:absolute;left:0;top:0;width:2px;height:0;background:var(--text);transition:height .6s var(--ease-quiet)}
  .service-row:hover::before{height:100%}
  .service-row:hover{padding-left:2.2rem}
  .service-row__num{font-family:'Oswald',sans-serif;font-weight:300;font-size:.8rem;letter-spacing:.18em;color:var(--text-faint)}
  .service-row__title{font-family:'Oswald',sans-serif;font-weight:300;font-size:1.8rem;letter-spacing:-.01em;line-height:1;transition:color .6s var(--ease-quiet)}
  .service-row:hover .service-row__title{color:var(--text)}
  .service-row__desc{font-size:.85rem;line-height:1.6;color:var(--text-mute);transition:color .6s var(--ease-quiet)}
  .service-row:hover .service-row__desc{color:var(--text-emp)}
  .service-row__arrow{font-family:'Oswald',sans-serif;font-weight:300;font-size:1.4rem;text-align:right;color:var(--text-faint);transition:transform .6s var(--ease-quiet),color .6s var(--ease-quiet)}
  .service-row:hover .service-row__arrow{transform:translateX(8px);color:var(--text)}
  @media(max-width:880px){
    .service-row{grid-template-columns:50px 1fr 40px;gap:1rem;padding:1.6rem .8rem}
    .service-row__desc{grid-column:2/4;font-size:.78rem;margin-top:.4rem}
    .service-row__title{font-size:1.3rem}
  }

  /* === capability / process === */
  .capability{display:grid;grid-template-columns:1fr 1.2fr;gap:6rem;align-items:start;max-width:1400px;margin:0 auto}
  .capability__sticky{position:sticky;top:6rem}
  .capability__title{font-family:'Oswald',sans-serif;font-weight:200;font-size:clamp(2.2rem,4.5vw,4rem);line-height:1;letter-spacing:-.01em;margin-bottom:2rem}
  .capability__sub{font-size:.95rem;line-height:1.6;color:var(--text-emp);max-width:380px}
  .capability__steps{display:flex;flex-direction:column;gap:.5rem}
  .step{padding:2.5rem 0;border-top:1px solid var(--line);display:grid;grid-template-columns:60px 1fr;gap:2rem;align-items:start}
  .step:last-child{border-bottom:1px solid var(--line)}
  .step__num{font-family:'Oswald',sans-serif;font-weight:200;font-size:2.6rem;line-height:.9;color:var(--text-faint)}
  .step__title{font-family:'Oswald',sans-serif;font-weight:300;font-size:1.5rem;line-height:1.1;letter-spacing:-.01em;margin-bottom:.8rem}
  .step__desc{font-size:.9rem;line-height:1.65;color:var(--text-mute)}
  @media(max-width:880px){.capability{grid-template-columns:1fr;gap:3rem}.capability__sticky{position:static}.step{grid-template-columns:40px 1fr;gap:1.2rem;padding:1.8rem 0}.step__num{font-size:1.8rem}}

  /* === quote === */
  .quote{padding:10rem 2rem;text-align:center}
  .quote__mark{font-family:'Oswald',sans-serif;font-weight:200;font-size:8rem;line-height:.6;color:var(--text-faint);margin-bottom:2rem}
  .quote__text{font-family:'Oswald',sans-serif;font-weight:200;font-size:clamp(1.8rem,3.8vw,3rem);line-height:1.25;letter-spacing:-.01em;max-width:1000px;margin:0 auto 3rem}
  .quote__text .italic{font-style:italic;font-weight:300}
  .quote__cite{font-size:.7rem;letter-spacing:.28em;text-transform:uppercase;color:var(--text-mute)}

  /* === contact === */
  .contact{padding:10rem 2rem;border-top:1px solid var(--line)}
  .contact__grid{display:grid;grid-template-columns:1fr 1fr;gap:6rem;max-width:1400px;margin:0 auto;align-items:start}
  .contact__title{font-family:'Oswald',sans-serif;font-weight:200;font-size:clamp(2.5rem,6vw,5rem);line-height:.95;letter-spacing:-.015em;margin-bottom:2.5rem}
  .contact__title .italic{font-style:italic;font-weight:300}
  .contact__sub{font-size:1rem;line-height:1.7;color:var(--text-emp);max-width:440px;margin-bottom:3rem}
  .contact__cta{display:inline-flex;align-items:center;gap:1rem;padding:1.2rem 2rem;border:1px solid var(--text);font-family:'Oswald',sans-serif;font-weight:300;font-size:.85rem;letter-spacing:.22em;text-transform:uppercase;transition:background .4s var(--ease-precise),color .4s var(--ease-precise)}
  .contact__cta:hover{background:var(--text);color:var(--bg)}
  .contact__cta-arrow{transition:transform .4s var(--ease-precise)}
  .contact__cta:hover .contact__cta-arrow{transform:translateX(6px)}
  .contact__details{display:flex;flex-direction:column;gap:3rem}
  .detail__label{font-size:.7rem;letter-spacing:.28em;text-transform:uppercase;color:var(--text-mute);margin-bottom:.8rem;display:flex;align-items:center;gap:1rem}
  .detail__label::before{content:"";width:24px;height:1px;background:var(--text-faint)}
  .detail__value{font-family:'Oswald',sans-serif;font-weight:300;font-size:1.6rem;line-height:1.3;letter-spacing:-.005em;color:var(--text)}
  .detail__value a{border-bottom:1px solid transparent;transition:border-color .4s var(--ease-precise)}
  .detail__value a:hover{border-color:var(--text)}
  .detail__note{font-size:.85rem;color:var(--text-mute);margin-top:.6rem;line-height:1.5}
  @media(max-width:880px){.contact__grid{grid-template-columns:1fr;gap:3rem}.detail__value{font-size:1.3rem}}

  /* === footer === */
  footer{padding:5rem 2rem 3rem;border-top:1px solid var(--line);font-size:.75rem;color:var(--text-mute)}
  .footer__grid{display:grid;grid-template-columns:1.4fr 1fr 1fr 1fr;gap:3rem;max-width:1400px;margin:0 auto 4rem}
  .footer__brand{font-family:'Oswald',sans-serif;font-weight:500;font-size:1rem;letter-spacing:.18em;text-transform:uppercase;color:var(--text);margin-bottom:1rem}
  .footer__tag{font-family:'Oswald',sans-serif;font-weight:200;font-size:1.6rem;line-height:1.1;color:var(--text-emp);margin-bottom:1.5rem;letter-spacing:-.01em}
  .footer__tag .italic{font-style:italic;font-weight:300}
  .footer__desc{line-height:1.65;max-width:320px}
  .footer__col-title{font-size:.7rem;letter-spacing:.28em;text-transform:uppercase;color:var(--text);margin-bottom:1.5rem;font-weight:400}
  .footer__col ul{list-style:none;display:flex;flex-direction:column;gap:.7rem}
  .footer__col li{line-height:1.5;transition:color .3s var(--ease-precise)}
  .footer__col li:hover{color:var(--text)}
  .footer__bottom{display:flex;justify-content:space-between;align-items:center;padding-top:2rem;border-top:1px solid var(--line);max-width:1400px;margin:0 auto;flex-wrap:wrap;gap:1rem;font-size:.7rem;letter-spacing:.18em;text-transform:uppercase}
  @media(max-width:880px){.footer__grid{grid-template-columns:1fr 1fr;gap:2.5rem}.footer__bottom{justify-content:flex-start}}

  /* === reduced motion === */
  @media(prefers-reduced-motion:reduce){
    *{animation-duration:.01ms!important;transition-duration:.01ms!important;animation-iteration-count:1!important}
    .line{transform:none!important}
    .manifesto__text .word{opacity:1!important;filter:none!important}
  }
</style>
</head>
<body>

<div class="noise-overlay"></div>
<div class="cursor-dot"></div>
<div class="cursor-ring"></div>

<!-- ============== NAV ============== -->
<nav class="nav">
  <a href="#" class="nav__brand">KSG<span> · Technologies</span></a>
  <div class="nav__menu">
    <a href="#capabilities">Capabilities</a>
    <a href="#products">Products</a>
    <a href="#services">Services</a>
    <a href="#process">Process</a>
    <a href="#contact">Contact</a>
  </div>
  <a href="tel:+918884380579" class="nav__phone">+91 88843 80579</a>
</nav>

<!-- ============== HERO ============== -->
<section class="hero">
  <div class="hero__watermark">KSG</div>
  <div class="hero__top">
    <div class="hero__top-left">An independent safety systems house based in Velachery, Chennai — designing, supplying and servicing fire & security infrastructure since 2009.</div>
    <div class="hero__top-right">Est. 2009<br>Chennai · Tamil Nadu<br>ISO-aligned practice</div>
  </div>

  <div style="position:relative;z-index:2;max-width:1400px;margin:0 auto;width:100%">
    <div class="hero__eyebrow fade-up">Fire & Safety Solutions · Smart Infrastructure</div>
    <h1 class="hero__title">
      <span class="line-mask"><span class="line" data-line1>Smart solutions</span></span>
      <span class="line-mask"><span class="line italic" data-line2>for safe spaces.</span></span>
    </h1>
    <div class="hero__meta">
      <p class="hero__sub fade-up">From metal detectors at the gate to boom barriers, sliding-door motors, access control and full fire-alarm architecture — KSG Technologies engineers the quiet machinery that keeps people, property and premises intact.</p>
      <div class="hero__scroll fade-up">Scroll to begin</div>
    </div>
  </div>
</section>

<!-- ============== MARQUEE ============== -->
<div class="marquee">
  <div class="marquee__track">
    <span>Metal Detectors</span><span class="dot">·</span>
    <span>Boom Barriers</span><span class="dot">·</span>
    <span>Sliding Door Motors</span><span class="dot">·</span>
    <span>Access Control</span><span class="dot">·</span>
    <span>Fire Alarm Systems</span><span class="dot">·</span>
    <span>CCTV Surveillance</span><span class="dot">·</span>
    <span>Fire Extinguishers</span><span class="dot">·</span>
    <span>Evacuation Signage</span><span class="dot">·</span>
    <span>Metal Detectors</span><span class="dot">·</span>
    <span>Boom Barriers</span><span class="dot">·</span>
    <span>Sliding Door Motors</span><span class="dot">·</span>
    <span>Access Control</span><span class="dot">·</span>
    <span>Fire Alarm Systems</span><span class="dot">·</span>
    <span>CCTV Surveillance</span><span class="dot">·</span>
    <span>Fire Extinguishers</span><span class="dot">·</span>
    <span>Evacuation Signage</span><span class="dot">·</span>
  </div>
</div>

<!-- ============== MANIFESTO ============== -->
<section class="manifesto" id="capabilities">
  <div class="container-narrow">
    <div class="manifesto__label">A note from the workshop</div>
    <p class="manifesto__text" id="manifesto-text">Safety is not a product you unbox once and forget. It is a quiet discipline — engineered into doorways, woven through wiring, calibrated against the day everything else fails. For fifteen years we have built that discipline into hospitals, factories, schools and towers across Tamil Nadu. No theatre. No sirens. Just the right detector in the right doorway, the right barrier at the right gate, serviced before anyone notices it needed servicing.</p>
    <div class="manifesto__sign">
      <div class="manifesto__sign-name">KSG Technologies</div>
      <div class="manifesto__sign-role">Velachery, Chennai · Est. 2009</div>
    </div>
  </div>
</section>

<!-- ============== STATS ============== -->
<section class="stats">
  <div class="stats__grid">
    <div class="stat fade-up">
      <div class="stat__num">15<sup>YRS</sup></div>
      <div class="stat__label">In the safety trade, since 2009</div>
    </div>
    <div class="stat fade-up">
      <div class="stat__num">1,200<sup>+</sup></div>
      <div class="stat__label">Premises secured across Tamil Nadu</div>
    </div>
    <div class="stat fade-up">
      <div class="stat__num">48<sup>HRS</sup></div>
      <div class="stat__label">Mean service-response window</div>
    </div>
    <div class="stat fade-up">
      <div class="stat__num">06</div>
      <div class="stat__label">Core verticals, one accountable house</div>
    </div>
  </div>
</section>

<!-- ============== SCRAPBOOK (scattered postcards) ============== -->
<section class="scrapbook-wrap" id="products">
  <div class="container">
    <div class="eyebrow fade-up">The catalogue, in passing</div>
    <h2 class="section-title fade-up">Hardware, <span class="italic">handled with care.</span></h2>

    <div class="scrapbook">
      <div class="polaroid" style="top:2%;left:3%" data-rotation="-7">
        <img src="https://picsum.photos/seed/ksg-handheld-metal-detector/600/800" alt="Hand-held metal detector">
        <div class="polaroid__cap">Hand-held metal detector<small>HHMD · gate screening</small></div>
      </div>
      <div class="polaroid" style="top:0%;left:24%" data-rotation="4">
        <img src="https://picsum.photos/seed/ksg-door-frame-metal-detector/600/800" alt="Door frame metal detector">
        <div class="polaroid__cap">Door-frame metal detector<small>DFMD · multi-zone</small></div>
      </div>
      <div class="polaroid" style="top:8%;left:46%" data-rotation="-3">
        <img src="https://picsum.photos/seed/ksg-boom-barrier-gate/600/800" alt="Boom barrier gate">
        <div class="polaroid__cap">Boom barrier gate<small>Parking & access control</small></div>
      </div>
      <div class="polaroid" style="top:4%;left:68%" data-rotation="8">
        <img src="https://picsum.photos/seed/ksg-sliding-door-motor/600/800" alt="Automatic sliding door motor">
        <div class="polaroid__cap">Sliding door motor<small>Automatic · geared</small></div>
      </div>
      <div class="polaroid" style="top:42%;left:12%" data-rotation="6">
        <img src="https://picsum.photos/seed/ksg-fire-alarm-panel/600/800" alt="Fire alarm control panel">
        <div class="polaroid__cap">Fire alarm control panel<small>Conventional & addressable</small></div>
      </div>
      <div class="polaroid" style="top:48%;left:34%" data-rotation="-9">
        <img src="https://picsum.photos/seed/ksg-biometric-access-control/600/800" alt="Biometric access control">
        <div class="polaroid__cap">Biometric access control<small>Fingerprint · RFID · face</small></div>
      </div>
      <div class="polaroid" style="top:40%;left:56%" data-rotation="5">
        <img src="https://picsum.photos/seed/ksg-cctv-surveillance-dome/600/800" alt="CCTV surveillance dome camera">
        <div class="polaroid__cap">CCTV surveillance<small>IP · dome · bullet</small></div>
      </div>
      <div class="polaroid" style="top:46%;left:78%" data-rotation="-4">
        <img src="https://picsum.photos/seed/ksg-fire-extinguisher-set/600/800" alt="Fire extinguisher set">
        <div class="polaroid__cap">Fire extinguisher set<small>DCP · CO₂ · foam · clean agent</small></div>
      </div>
    </div>
  </div>
</section>

<!-- ============== MOSAIC — CATALOGUE ============== -->
<section style="padding:8rem 0 10rem;background:#161616;color:#fff;border-top:1px solid #161616">
  <div style="padding:0 2rem;max-width:1600px;margin:0 auto">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:4rem;gap:2rem;flex-wrap:wrap">
      <div>
        <div style="font-size:.7rem;letter-spacing:.28em;text-transform:uppercase;color:rgba(255,255,255,.5);margin-bottom:2rem;display:flex;align-items:center;gap:1rem"><span style="width:32px;height:1px;background:rgba(255,255,255,.4)"></span>The catalogue, indexed</div>
        <h2 style="font-family:'Oswald',sans-serif;font-weight:200;font-size:clamp(2.2rem,5.5vw,5rem);line-height:1;letter-spacing:-.01em">Eight categories. <span style="font-style:italic;font-weight:300">One supplier.</span></h2>
      </div>
      <div style="max-width:340px;font-size:.95rem;line-height:1.6;color:rgba(255,255,255,.65)">Hover any tile to bring it forward. The full stock list, spec sheets and datasheets are available on request — we keep the conversation specific.</div>
    </div>
  </div>

  <div class="mosaic" style="padding:0 2rem">
    <div class="mosaic-tile">
      <img class="mosaic-tile__image" src="https://picsum.photos/seed/ksg-mosaic-metal-detector/700/900" alt="Metal detectors">
      <div class="mosaic-tile__overlay"></div>
      <div class="mosaic-tile__meta">
        <div class="mosaic-tile__num">01 / Detection</div>
        <div class="mosaic-tile__title">Metal Detectors</div>
      </div>
    </div>
    <div class="mosaic-tile">
      <img class="mosaic-tile__image" src="https://picsum.photos/seed/ksg-mosaic-boom-barrier/700/900" alt="Boom barriers">
      <div class="mosaic-tile__overlay"></div>
      <div class="mosaic-tile__meta">
        <div class="mosaic-tile__num">02 / Perimeter</div>
        <div class="mosaic-tile__title">Boom Barriers</div>
      </div>
    </div>
    <div class="mosaic-tile">
      <img class="mosaic-tile__image" src="https://picsum.photos/seed/ksg-mosaic-door-motor/700/900" alt="Sliding door motors">
      <div class="mosaic-tile__overlay"></div>
      <div class="mosaic-tile__meta">
        <div class="mosaic-tile__num">03 / Automation</div>
        <div class="mosaic-tile__title">Sliding Door Motors</div>
      </div>
    </div>
    <div class="mosaic-tile">
      <img class="mosaic-tile__image" src="https://picsum.photos/seed/ksg-mosaic-access-control/700/900" alt="Access control">
      <div class="mosaic-tile__overlay"></div>
      <div class="mosaic-tile__meta">
        <div class="mosaic-tile__num">04 / Identity</div>
        <div class="mosaic-tile__title">Access Control</div>
      </div>
    </div>
    <div class="mosaic-tile">
      <img class="mosaic-tile__image" src="https://picsum.photos/seed/ksg-mosaic-fire-alarm/700/900" alt="Fire alarms">
      <div class="mosaic-tile__overlay"></div>
      <div class="mosaic-tile__meta">
        <div class="mosaic-tile__num">05 / Fire alarm</div>
        <div class="mosaic-tile__title">Fire Alarm Systems</div>
      </div>
    </div>
    <div class="mosaic-tile">
      <img class="mosaic-tile__image" src="https://picsum.photos/seed/ksg-mosaic-cctv-camera/700/900" alt="CCTV">
      <div class="mosaic-tile__overlay"></div>
      <div class="mosaic-tile__meta">
        <div class="mosaic-tile__num">06 / Surveillance</div>
        <div class="mosaic-tile__title">CCTV & IP Video</div>
      </div>
    </div>
    <div class="mosaic-tile">
      <img class="mosaic-tile__image" src="https://picsum.photos/seed/ksg-mosaic-extinguisher/700/900" alt="Extinguishers">
      <div class="mosaic-tile__overlay"></div>
      <div class="mosaic-tile__meta">
        <div class="mosaic-tile__num">07 / Suppression</div>
        <div class="mosaic-tile__title">Extinguishers & Foam</div>
      </div>
    </div>
    <div class="mosaic-tile">
      <img class="mosaic-tile__image" src="https://picsum.photos/seed/ksg-mosaic-signage/700/900" alt="Signage">
      <div class="mosaic-tile__overlay"></div>
      <div class="mosaic-tile__meta">
        <div class="mosaic-tile__num">08 / Egress</div>
        <div class="mosaic-tile__title">Evacuation Signage</div>
      </div>
    </div>
  </div>
</section>

<!-- ============== SERVICES LIST ============== -->
<section class="services" id="services">
  <div class="container">
    <div class="services__header">
      <div>
        <div class="eyebrow fade-up">What we do, end to end</div>
        <h2 class="section-title fade-up">Six services, <span class="italic">one phone number.</span></h2>
      </div>
      <p class="services__intro fade-up">Most safety vendors disappear after the invoice. We stay — for the calibration, the refills, the false-alarm at 2 a.m. and the audit next quarter.</p>
    </div>

    <div class="services__list">
      <div class="service-row">
        <div class="service-row__num">01</div>
        <div class="service-row__title">Site survey & risk audit</div>
        <div class="service-row__desc">A walk-through of your premises with a checklist drawn from NBC-2016 and TNSPCB norms — exit routes, occupancy class, hazard mapping, detector coverage plotted on as-built drawings.</div>
        <div class="service-row__arrow">→</div>
      </div>
      <div class="service-row">
        <div class="service-row__num">02</div>
        <div class="service-row__title">Supply & installation</div>
        <div class="service-row__desc">Sourced from CE / UL-listed principals, installed by our own crews (no subcontractors), with as-installed drawings and acceptance test packs handed over before sign-off.</div>
        <div class="service-row__arrow">→</div>
      </div>
      <div class="service-row">
        <div class="service-row__num">03</div>
        <div class="service-row__title">Annual maintenance contracts</div>
        <div class="service-row__desc">Comprehensive and non-comprehensive AMC options. Quarterly visits, battery and pressure checks, sensor cleaning, log-book discipline — and a guaranteed 48-hour response window.</div>
        <div class="service-row__arrow">→</div>
      </div>
      <div class="service-row">
        <div class="service-row__num">04</div>
        <div class="service-row__title">Refilling & hydro testing</div>
        <div class="service-row__desc">Fire extinguisher refills, CO₂ weight checks, DCP refill, foam concentration testing, and periodic hydrostatic testing of cylinders as per IS 2878.</div>
        <div class="service-row__arrow">→</div>
      </div>
      <div class="service-row">
        <div class="service-row__num">05</div>
        <div class="service-row__title">Compliance & third-party audits</div>
        <div class="service-row__desc">Pre-audit preparation for Fire Department / CIF / TAC inspections. We close observations, hand you the rectification report, and stand beside you on the audit day.</div>
        <div class="service-row__arrow">→</div>
      </div>
      <div class="service-row">
        <div class="service-row__num">06</div>
        <div class="service-row__title">Training & mock drills</div>
        <div class="service-row__desc">Warden training, evacuation drills, hands-on extinguisher practice, and a debrief — conducted at your premises for staff, security teams and facility managers.</div>
        <div class="service-row__arrow">→</div>
      </div>
    </div>
  </div>
</section>

<!-- ============== CAPABILITY / PROCESS ============== -->
<section id="process" style="padding:10rem 2rem">
  <div class="capability">
    <div class="capability__sticky">
      <div class="eyebrow fade-up">How a project runs</div>
      <h2 class="capability__title fade-up">From the first walkthrough <span class="italic">to the quarterly service visit.</span></h2>
      <p class="capability__sub fade-up">A fixed four-step engagement that keeps you in the loop, on paper, at every stage. No verbal commitments, no surprise extras.</p>
    </div>
    <div class="capability__steps">
      <div class="step fade-up">
        <div class="step__num">01</div>
        <div>
          <h3 class="step__title">Survey & scope</h3>
          <p class="step__desc">We walk the site, measure the doorways, count the exits, note the occupancy, and return with a written scope — equipment list, BOQ, drawings, and a fixed-price quote within seven working days.</p>
        </div>
      </div>
      <div class="step fade-up">
        <div class="step__num">02</div>
        <div>
          <h3 class="step__title">Supply & install</h3>
          <p class="step__desc">Materials arrive with mill / factory test certificates. Our crews install, cable, label and terminate — you receive an as-installed drawing pack and a single-page acceptance test sheet for sign-off.</p>
        </div>
      </div>
      <div class="step fade-up">
        <div class="step__num">03</div>
        <div>
          <h3 class="step__title">Commission & train</h3>
          <p class="step__desc">System goes live after a witnessed function test. Your facility team gets a 90-minute handover session, a printed docket of operating instructions, and an emergency contact card.</p>
        </div>
      </div>
      <div class="step fade-up">
        <div class="step__num">04</div>
        <div>
          <h3 class="step__title">Service & sustain</h3>
          <p class="step__desc">Quarterly visits under AMC, annual refills scheduled automatically, and a yearly compliance health-check sent before your fire audit falls due. The relationship outlives the invoice.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ============== QUOTE ============== -->
<section class="quote">
  <div class="container-narrow">
    <div class="quote__mark fade-up">"</div>
    <p class="quote__text fade-up">The detector in the corridor never gets talked about — <span class="italic">until the day it does its job.</span> Our work is to make sure that day goes quietly.</p>
    <div class="quote__cite fade-up">KSG Technologies · Operating principle, 2009</div>
  </div>
</section>

<!-- ============== CONTACT ============== -->
<section class="contact" id="contact">
  <div class="contact__grid">
    <div>
      <div class="eyebrow fade-up">Begin a conversation</div>
      <h1 class="contact__title fade-up">Smart solutions, <span class="italic">safe spaces.</span></h1>
      <p class="contact__sub fade-up">Tell us about your premises — the square footage, the occupancy, the gaps you already know about. We will come back with a scope, a quote, and a timeline, usually within seven working days.</p>
      <a href="tel:+918884380579" class="contact__cta fade-up">
        <span>Call +91 88843 80579</span>
        <span class="contact__cta-arrow">→</span>
      </a>
    </div>
    <div class="contact__details">
      <div class="detail fade-up">
        <div class="detail__label">Phone</div>
        <div class="detail__value"><a href="tel:+918884380579">+91 88843 80579</a></div>
        <div class="detail__note">Mon–Sat, 09:30 to 18:30 IST. Emergency service calls answered round the clock for AMC customers.</div>
      </div>
      <div class="detail fade-up">
        <div class="detail__label">Workshop & office</div>
        <div class="detail__value">Velachery,<br>Chennai — 600042<br>Tamil Nadu, India</div>
        <div class="detail__note">Walk-ins by appointment. Free parking on premises; nearest metro station Velachery (Blue Line).</div>
      </div>
      <div class="detail fade-up">
        <div class="detail__label">Email</div>
        <div class="detail__value"><a href="mailto:enquiry@ksgtechnologies.in">enquiry@ksgtechnologies.in</a></div>
        <div class="detail__note">For RFQs, datasheets and AMC renewals. We aim to reply within one business day.</div>
      </div>
      <div class="detail fade-up">
        <div class="detail__label">Hours</div>
        <div class="detail__value">Mon — Sat<br>09:30 — 18:30</div>
        <div class="detail__note">Sundays observed. Public holidays as per Tamil Nadu government calendar.</div>
      </div>
    </div>
  </div>
</section>

<!-- ============== FOOTER ============== -->
<footer>
  <div class="footer__grid">
    <div>
      <div class="footer__brand">KSG · Technologies</div>
      <div class="footer__tag">Smart solutions, <span class="italic">safe spaces.</span></div>
      <p class="footer__desc">An independent fire & safety systems house based in Velachery, Chennai — supplying, installing and servicing metal detectors, boom barriers, sliding-door motors, access control, fire alarms, CCTV and extinguishers across Tamil Nadu since 2009.</p>
    </div>
    <div class="footer__col">
      <div class="footer__col-title">Products</div>
      <ul>
        <li>Metal detectors</li>
        <li>Boom barriers</li>
        <li>Sliding door motors</li>
        <li>Access control</li>
        <li>Fire alarm systems</li>
        <li>CCTV surveillance</li>
      </ul>
    </div>
    <div class="footer__col">
      <div class="footer__col-title">Services</div>
      <ul>
        <li>Site survey & risk audit</li>
        <li>Supply & installation</li>
        <li>Annual maintenance</li>
        <li>Refilling & hydro testing</li>
        <li>Compliance audits</li>
        <li>Training & mock drills</li>
      </ul>
    </div>
    <div class="footer__col">
      <div class="footer__col-title">Reach</div>
      <ul>
        <li>+91 88843 80579</li>
        <li>enquiry@ksgtechnologies.in</li>
        <li>Velachery, Chennai — 600042</li>
        <li>Mon–Sat · 09:30–18:30</li>
      </ul>
    </div>
  </div>
  <div class="footer__bottom">
    <div>© 2025 KSG Technologies · Fire & Safety Solutions</div>
    <div>Velachery · Chennai · Tamil Nadu · India</div>
  </div>
</footer>

<!-- ============== SCRIPTS ============== -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lenis@1.3.13/dist/lenis.min.js"></script>

<script>
  gsap.registerPlugin(ScrollTrigger);
  const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* === Lenis smooth scroll === */
  if (!reduce && window.Lenis) {
    const lenis = new Lenis({ duration: 1.2, easing: t => Math.min(1, 1.001 - Math.pow(2, -10 * t)) });
    function raf(time){ lenis.raf(time); requestAnimationFrame(raf); }
    requestAnimationFrame(raf);
    lenis.on('scroll', ScrollTrigger.update);
  }

  /* === Custom cursor === */
  const dot = document.querySelector('.cursor-dot');
  const ring = document.querySelector('.cursor-ring');
  if (window.matchMedia('(pointer: fine)').matches) {
    let mx=0,my=0,rx=0,ry=0;
    window.addEventListener('mousemove', e => {
      mx=e.clientX; my=e.clientY;
      dot.classList.add('is-visible'); ring.classList.add('is-visible');
      dot.style.transform = `translate(${mx-3}px, ${my-3}px)`;
    });
    document.addEventListener('mouseleave', () => { dot.classList.remove('is-visible'); ring.classList.remove('is-visible'); });
    (function tick(){
      rx += (mx-rx)*0.15; ry += (my-ry)*0.15;
      ring.style.transform = `translate(${rx-16}px, ${ry-16}px)`;
      requestAnimationFrame(tick);
    })();
    document.querySelectorAll('a, button, .polaroid, .mosaic-tile, .service-row').forEach(el => {
      el.addEventListener('mouseenter', () => { ring.style.width='60px'; ring.style.height='60px'; });
      el.addEventListener('mouseleave', () => { ring.style.width='32px'; ring.style.height='32px'; });
    });
  }

  /* === Hero line-mask double === */
  if (!reduce) {
    gsap.set(['[data-line1]','[data-line2]'], { yPercent: 110 });
    gsap.to(['[data-line1]','[data-line2]'], {
      yPercent: 0, duration: 1.2, ease: 'power4.out', stagger: 0.14, delay: 0.2
    });
  } else {
    document.querySelectorAll('.line').forEach(l => l.style.transform = 'none');
  }

  /* === Fade-up observer === */
  const fadeObs = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('is-in'); fadeObs.unobserve(e.target); }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -8% 0px' });
  document.querySelectorAll('.fade-up').forEach(el => fadeObs.observe(el));

  /* === Scattered postcards — apply rotation === */
  document.querySelectorAll('.polaroid').forEach(p => {
    const r = parseFloat(p.dataset.rotation) || (Math.random() - 0.5) * 16;
    p.style.transform = `rotate(${r}deg)`;
  });

  /* === Mosaic push-back === */
  const mosaic = document.querySelector('.mosaic');
  if (mosaic) {
    mosaic.querySelectorAll('.mosaic-tile').forEach(t => {
      t.addEventListener('mouseenter', () => mosaic.classList.add('has-hover'));
      t.addEventListener('mouseleave', () => mosaic.classList.remove('has-hover'));
    });
  }

  /* === Manifesto scrub-blur words === */
  document.fonts.ready.then(() => {
    const textEl = document.getElementById('manifesto-text');
    if (textEl && !reduce) {
      const raw = textEl.textContent.trim();
      const words = raw.split(/\s+/);
      textEl.innerHTML = words.map(w => `<span class="word">${w}</span>`).join(' ');
      gsap.to('.manifesto__text .word', {
        opacity: 1,
        filter: 'blur(0px) brightness(100%)',
        stagger: 0.04,
        ease: 'sine.out',
        scrollTrigger: {
          trigger: '.manifesto',
          start: 'top 78%',
          end: 'center 55%',
          scrub: true
        }
      });
    } else if (textEl) {
      textEl.querySelectorAll('.word').forEach(w => { w.style.opacity = 1; w.style.filter = 'none'; });
    }
  });

  /* === Stat counter (subtle) === */
  document.querySelectorAll('.stat__num').forEach(el => {
    const original = el.innerHTML;
    const match = el.textContent.match(/(\d+)/);
    if (!match || reduce) return;
    const target = parseInt(match[1], 10);
    const suffix = el.innerHTML.substring(el.innerHTML.indexOf(match[1]) + match[1].length);
    ScrollTrigger.create({
      trigger: el,
      start: 'top 85%',
      once: true,
      onEnter: () => {
        const obj = { v: 0 };
        gsap.to(obj, {
          v: target, duration: 1.6, ease: 'power2.out',
          onUpdate: () => { el.innerHTML = Math.round(obj.v) + suffix; }
        });
      }
    });
  });
</script>
</body>
</html>