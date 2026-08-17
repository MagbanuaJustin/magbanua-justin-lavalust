<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SuperMagbanua</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  :root{
    --bg: #0d1117;
    --panel: #131a24;
    --accent: #39ff88;
    --accent-dim: #1f6b45;
    --text: #d7e2ea;
    --muted: #6b7c8c;
    --font: 'Consolas', 'Courier New', monospace;
  }
  *{ box-sizing: border-box; margin:0; padding:0; }
  body{
    background: var(--bg);
    color: var(--text);
    font-family: var(--font);
    min-height: 100vh;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    padding: 40px 20px;
    background-image:
      linear-gradient(rgba(57,255,136,0.04) 1px, transparent 1px),
      linear-gradient(90deg, rgba(57,255,136,0.04) 1px, transparent 1px);
    background-size: 28px 28px;
  }
  nav{
    position: fixed;
    top: 0; left: 0; right: 0;
    display:flex;
    justify-content:center;
    gap: 30px;
    padding: 16px;
    background: rgba(13,17,23,0.9);
    border-bottom: 1px solid var(--accent-dim);
    z-index: 10;
  }
  nav a{
    color: var(--muted);
    text-decoration:none;
    font-size: 14px;
    letter-spacing: 1px;
    padding: 6px 14px;
    border-radius: 4px;
    transition: 0.2s;
  }
  nav a:hover, nav a.active{
    color: var(--accent);
    background: rgba(57,255,136,0.08);
  }
  .terminal{
    width: 100%;
    max-width: 640px;
    background: var(--panel);
    border: 1px solid var(--accent-dim);
    border-radius: 10px;
    box-shadow: 0 0 40px rgba(57,255,136,0.08);
    overflow:hidden;
    margin-top: 60px;
  }
  .terminal-bar{
    display:flex;
    align-items:center;
    gap: 8px;
    padding: 10px 14px;
    background: #10161d;
    border-bottom: 1px solid var(--accent-dim);
  }
  .dot{ width:11px; height:11px; border-radius:50%; }
  .dot.red{ background:#ff5f56; }
  .dot.yellow{ background:#ffbd2e; }
  .dot.green{ background:#27c93f; }
  .terminal-title{
    margin-left: 10px;
    font-size: 12px;
    color: var(--muted);
  }
  .terminal-body{
    padding: 30px 28px 34px;
  }
  .prompt{ color: var(--muted); font-size: 13px; margin-bottom: 4px;}
  h1{
    font-size: 26px;
    color: var(--accent);
    margin-bottom: 6px;
  }
  #typed{ border-right: 2px solid var(--accent); padding-right: 4px; }
  .sub{
    color: var(--muted);
    font-size: 14px;
    margin: 14px 0 26px;
    line-height: 1.6;
  }
  .id-badge{
    display:inline-block;
    font-size: 12px;
    color: var(--accent);
    border: 1px solid var(--accent-dim);
    padding: 4px 10px;
    border-radius: 20px;
    margin-bottom: 22px;
  }
  .btn{
    display:inline-block;
    background: var(--accent);
    color: #0d1117;
    font-weight: bold;
    text-decoration: none;
    padding: 12px 22px;
    border-radius: 6px;
    font-size: 14px;
    letter-spacing: 0.5px;
    transition: 0.2s;
  }
  .btn:hover{
    background: #7dffb0;
    transform: translateY(-2px);
  }
  .footer-note{
    margin-top: 28px;
    font-size: 12px;
    color: var(--muted);
  }
  #clock{ color: var(--accent); }
</style>
</head>
<body>

<nav>
  <a href="<?= site_url('student') ?>" class="active">Super Home</a>
  <a href="<?= site_url('student/profile') ?>">Super Profile</a>
</nav>

<div class="terminal">
  <div class="terminal-bar">
    <span class="dot red"></span>
    <span class="dot yellow"></span>
    <span class="dot green"></span>
    <span class="terminal-title">student@lavalust: ~/home</span>
  </div>
  <div class="terminal-body">
    <div class="prompt">$Super student</div>
    <h1><span id="typed"></span></h1>
    <div class="id-badge">MCC2023-01376</div>
    <p class="sub">
      Welcome to my LavaLust-powered Student Information Page.
      This home page routes to a protected profile view guarded by
      <strong>StudentMiddleware</strong>. Head over to the profile page
      to see it in action.
    </p>
    <a href="<?= site_url('student/profile') ?>" class="btn">View Student Profile &rarr;</a>
    <p class="footer-note">System time: <span id="clock"></span></p>
  </div>
</div>

<script>
  // Simple typewriter effect for the heading
  const text = "Hi, I'm Justin James Magbanua.";
  const el = document.getElementById('typed');
  let i = 0;
  function type(){
    if(i < text.length){
      el.textContent += text.charAt(i);
      i++;
      setTimeout(type, 45);
    }
  }
  type();

  // Live clock
  function updateClock(){
    const now = new Date();
    document.getElementById('clock').textContent = now.toLocaleTimeString();
  }
  setInterval(updateClock, 1000);
  updateClock();
</script>

</body>
</html>