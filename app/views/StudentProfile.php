<?php defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Super Student Profile</title>
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
    padding: 100px 20px 40px;
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
  .access-banner{
    width: 100%;
    max-width: 640px;
    background: rgba(57,255,136,0.08);
    border: 1px solid var(--accent-dim);
    color: var(--accent);
    font-size: 13px;
    padding: 10px 16px;
    border-radius: 6px;
    margin-bottom: 20px;
    display:flex;
    align-items:center;
    gap: 8px;
  }
  .access-banner .dot{
    width:8px; height:8px; border-radius:50%;
    background: var(--accent);
    box-shadow: 0 0 8px var(--accent);
  }
  .card{
    width: 100%;
    max-width: 640px;
    background: var(--panel);
    border: 1px solid var(--accent-dim);
    border-radius: 10px;
    box-shadow: 0 0 40px rgba(57,255,136,0.08);
    overflow:hidden;
  }
  .card-head{
    display:flex;
    align-items:center;
    gap: 18px;
    padding: 26px 28px;
    border-bottom: 1px solid var(--accent-dim);
    background: #10161d;
  }
  .avatar{
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--accent), #0d1117);
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
    font-size: 20px;
    color: #0d1117;
    flex-shrink: 0;
  }
  .card-head h1{
    font-size: 20px;
    color: var(--accent);
    margin-bottom: 4px;
  }
  .card-head p{
    font-size: 12px;
    color: var(--muted);
  }
  .card-body{
    padding: 26px 28px;
  }
  .field{
    display:flex;
    justify-content: space-between;
    padding: 12px 0;
    border-bottom: 1px dashed #22303c;
    font-size: 14px;
  }
  .field:last-child{ border-bottom: none; }
  .field .label{ color: var(--muted); }
  .field .value{ color: var(--text); font-weight: bold; text-align: right; }
  .toggle-btn{
    margin-top: 22px;
    background: transparent;
    border: 1px solid var(--accent-dim);
    color: var(--accent);
    padding: 10px 16px;
    font-family: var(--font);
    font-size: 13px;
    border-radius: 6px;
    cursor: pointer;
    width: 100%;
    transition: 0.2s;
  }
  .toggle-btn:hover{
    background: rgba(57,255,136,0.08);
  }
  .extra{
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease;
  }
  .extra.open{ max-height: 600px; margin-top: 16px; }
  .extra p{
    font-size: 13px;
    color: var(--muted);
    line-height: 1.7;
  }
  .back-link{
    display:inline-block;
    margin-top: 20px;
    font-size: 12px;
    color: var(--muted);
    text-decoration: none;
  }
  .back-link:hover{ color: var(--accent); }
</style>
</head>
<body>

<nav>
  <a href="<?= site_url('student') ?>">Home</a>
  <a href="<?= site_url('student/profile') ?>" class="active">Student Profile</a>
</nav>

<div class="access-banner">
  <span class="dot"></span>
  StudentMiddleware: access granted &mdash; session verified.
</div>

<div class="card">
  <div class="card-head">
    <div class="avatar">JM</div>
    <div>
      <h1><?= htmlspecialchars($name ?? 'Magbanua Justin James E.') ?></h1>
      <p><?= htmlspecialchars($course ?? 'BS Information Technology') ?></p>
    </div>
  </div>
  <div class="card-body">
    <div class="field">
      <span class="label">Student ID</span>
      <span class="value"><?= htmlspecialchars($student_id ?? 'MCC2023-01376') ?></span>
    </div>
    <div class="field">
      <span class="label">Name</span>
      <span class="value"><?= htmlspecialchars($name ?? 'Magbanua Justin James E.') ?></span>
    </div>
    <div class="field">
      <span class="label">Course</span>
      <span class="value"><?= htmlspecialchars($course ?? 'Bachelor of Science in Information Technology') ?></span>
    </div>
    <div class="field">
      <span class="label">Year Level</span>
      <span class="value"><?= htmlspecialchars($year ?? '3rd Year') ?></span>
    </div>
    <div class="field">
      <span class="label">Section</span>
      <span class="value"><?= htmlspecialchars($section ?? '3-F5') ?></span>
    </div>
    <div class="field">
      <span class="label">Email</span>
      <span class="value"><?= htmlspecialchars($email ?? 'eborajustin25@gmail.com') ?></span>
    </div>

    <button class="toggle-btn" id="toggleBtn">show more info &darr;</button>
    <div class="extra" id="extraInfo">
      <div class="field">
        <span class="label">Address</span>
        <span class="value"><?= htmlspecialchars($address ?? 'Del-Pilar, Naujan City, Oriental Mindoro') ?></span>
      </div>
      <div class="field">
        <span class="label">Contact Number</span>
        <span class="value"><?= htmlspecialchars($contact_number ?? '09394393187') ?></span>
      </div>
      <div class="field">
        <span class="label">Skills</span>
        <span class="value"><?= htmlspecialchars($skills ?? 'Call Of Duty Player') ?></span>
      </div>
      <div class="field">
        <span class="label">Hobbies</span>
        <span class="value"><?= htmlspecialchars($hobbies ?? 'CODM and Minecraft Gaming') ?></span>
      </div>
      <div class="field">
        <span class="label">Social Media</span>
        <span class="value">
          <a href="<?= htmlspecialchars($social_link ?? 'https://www.facebook.com/JAzeyTwilightMoon') ?>" target="_blank" rel="noopener" style="color: var(--accent); text-decoration: none;">Facebook &#8599;</a>
        </span>
      </div>
      <p style="margin-top: 16px;">
        <?= htmlspecialchars($description ?? 'A 3rd year IT student building projects like this one in between matches. When I\'m not coding, you\'ll probably find me grinding ranked in CODM or building bases in Minecraft.') ?>
      </p>
    </div>
  </div>
</div>

<a href="<?= site_url('student') ?>" class="back-link">&larr; back to home</a>

<script>
  const btn = document.getElementById('toggleBtn');
  const extra = document.getElementById('extraInfo');
  btn.addEventListener('click', () => {
    extra.classList.toggle('open');
    btn.textContent = extra.classList.contains('open')
      ? 'show less info ↑'
      : 'show more info ↓';
  });
</script>

</body>
</html>