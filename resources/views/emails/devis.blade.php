<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Georgia, serif; color: #2a1515; background: #fdf8f3; margin: 0; padding: 0; }
        .wrapper { max-width: 600px; margin: 0 auto; padding: 40px 20px; }
        .header { background: linear-gradient(160deg, #3D1F1F, #8f0e16); color: #fff; padding: 32px; border-radius: 12px 12px 0 0; text-align: center; }
        .header h1 { font-size: 1.8rem; margin: 0 0 8px; }
        .header p { font-size: 0.9rem; color: rgba(255,255,255,0.7); margin: 0; }
        .body { background: #fff; padding: 32px; border: 1px solid #eaddd8; }
        .field { margin-bottom: 16px; }
        .field label { display: block; font-size: 0.75rem; letter-spacing: 0.15em; text-transform: uppercase; color: #C0141E; font-weight: bold; margin-bottom: 4px; }
        .field p { margin: 0; font-size: 1rem; color: #2a1515; }
        .footer { background: #fdf8f3; padding: 20px 32px; border: 1px solid #eaddd8; border-top: none; border-radius: 0 0 12px 12px; text-align: center; font-size: 0.8rem; color: #7a5050; }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="header">
        <h1>✦ Nouvelle demande de devis</h1>
        <p>Madame Petit Plat — {{ now()->format('d/m/Y à H:i') }}</p>
    </div>
    <div class="body">
        <div class="field">
            <label>Client</label>
            <p>{{ $client->prenom }} {{ $client->nom }}</p>
        </div>
        <div class="field">
            <label>Email</label>
            <p><a href="mailto:{{ $client->email }}">{{ $client->email }}</a></p>
        </div>
        @if($client->telephone)
        <div class="field">
            <label>Téléphone</label>
            <p>{{ $client->telephone }}</p>
        </div>
        @endif
        <div class="field">
            <label>Type d'événement</label>
            <p>{{ ucfirst(str_replace('_', ' ', $devis->type_evenement)) }}</p>
        </div>
        <div class="field">
            <label>Nombre de convives</label>
            <p>{{ $devis->nb_convives }}</p>
        </div>
        @if($devis->date_evenement)
        <div class="field">
            <label>Date de l'événement</label>
            <p>{{ $devis->date_evenement->format('d/m/Y') }}</p>
        </div>
        @endif
        @if($devis->message)
        <div class="field">
            <label>Message</label>
            <p>{{ $devis->message }}</p>
        </div>
        @endif
    </div>
    <div class="footer">
        Madame Petit Plat · Rennes, Bretagne
    </div>
</div>
</body>
</html>