<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation d'inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .inscription-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .inscription-number {
            font-size: 18px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        table td:first-child {
            font-weight: bold;
            width: 40%;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Confirmation d'inscription</h1>
    </div>

    <p>Bonjour {{ $inscription->nom }} {{ $inscription->prenoms }},</p>

    <p>Nous vous remercions pour votre inscription à la formation <strong>{{ $inscription->formation->titre }}</strong>.</p>

    <div class="inscription-details">
        <div class="inscription-number">Numéro d'inscription : {{ $inscription->getNumeroInscription() }}</div>

        <table>
            <tr>
                <td>Nom complet :</td>
                <td>{{ $inscription->nom }} {{ $inscription->prenoms }}</td>
            </tr>
            <tr>
                <td>Formation :</td>
                <td>{{ $inscription->formation->titre }}</td>
            </tr>
            @if($inscription->formation->date_debut)
            <tr>
                <td>Date de début :</td>
                <td>{{ $inscription->formation->date_debut->format('d/m/Y') }}</td>
            </tr>
            @endif
            <tr>
                <td>Ville :</td>
                <td>{{ $inscription->ville->nom }}</td>
            </tr>
            <tr>
                <td>Contact :</td>
                <td>{{ $inscription->contact }}</td>
            </tr>
            @if($inscription->email)
            <tr>
                <td>Email :</td>
                <td>{{ $inscription->email }}</td>
            </tr>
            @endif
        </table>
    </div>

    <p>Nous vous contacterons prochainement pour vous donner plus de détails sur la formation.</p>

    <p>Bien cordialement,<br>
    L'équipe de formation</p>

    <div class="footer">
        <p>Ceci est un mail automatique, merci de ne pas y répondre directement.</p>
    </div>
</body>
</html> 