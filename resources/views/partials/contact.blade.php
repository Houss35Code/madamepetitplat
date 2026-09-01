<section id="contact" aria-labelledby="contact-titre">

    {{-- COLONNE GAUCHE — informations --}}
    <div class="fade-up">
        <span class="section-label">Contact</span>
        <h2 id="contact-titre" class="section-title">Parlons de votre <em>événement</em></h2>
        <div class="divider" aria-hidden="true"></div>
        <p class="section-intro">Vous avez un projet ? Une question ? Contactez Isabel pour échanger sur vos besoins et obtenir un devis personnalisé sous 48h.</p>

        <ul class="contact-details" aria-label="Coordonnées">
            <li class="contact-detail">
                <div class="icon" aria-hidden="true">📍</div>
                <div><h3>Zone d'intervention</h3><p>Rennes &amp; ses alentours</p></div>
            </li>
            <li class="contact-detail">
                <div class="icon" aria-hidden="true">📧</div>
                <div><h3>Email</h3><p><a href="mailto:iloisell@orange.fr">iloisell@orange.fr</a></p></div>
            </li>
            <li class="contact-detail">
                <div class="icon" aria-hidden="true">📱</div>
                <div><h3>Téléphone</h3><p>06-76-26-08-06</p></div>
            </li>
            <li class="contact-detail">
                <div class="icon" aria-hidden="true">🕐</div>
                <div><h3>Réponse</h3><p>Sous 48h ouvrées</p></div>
            </li>
        </ul>
    </div>

    {{-- COLONNE DROITE — formulaire --}}
    <div class="contact-form fade-up">
        <h3>Demande de devis</h3>

        @if(session('success'))
            <div class="form-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="form-errors" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST" novalidate>
            @csrf

            {{-- Honeypot anti-spam (CDC §6) --}}
            <div class="hp-field" aria-hidden="true">
                <input type="text" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="prenom">Prénom <span aria-label="obligatoire">*</span></label>
                    <input type="text" id="prenom" name="prenom"
                           value="{{ old('prenom') }}"
                           placeholder="Marie"
                           aria-required="true"
                           autocomplete="given-name"
                           required>
                </div>
                <div class="form-group">
                    <label for="nom">Nom <span aria-label="obligatoire">*</span></label>
                    <input type="text" id="nom" name="nom"
                           value="{{ old('nom') }}"
                           placeholder="Dupont"
                           aria-required="true"
                           autocomplete="family-name"
                           required>
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email <span aria-label="obligatoire">*</span></label>
                <input type="email" id="email" name="email"
                       value="{{ old('email') }}"
                       placeholder="marie@exemple.fr"
                       aria-required="true"
                       autocomplete="email"
                       required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="tel" id="telephone" name="telephone"
                       value="{{ old('telephone') }}"
                       placeholder="06 XX XX XX XX"
                       autocomplete="tel">
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="type_evenement">Type d'événement <span aria-label="obligatoire">*</span></label>
                    <select id="type_evenement" name="type_evenement" aria-required="true" required>
                        <option value="">— Choisir —</option>
                        <option value="anniversaire"          {{ old('type_evenement') == 'anniversaire'          ? 'selected' : '' }}>Anniversaire</option>
                        <option value="mariage"               {{ old('type_evenement') == 'mariage'               ? 'selected' : '' }}>Mariage / PACS</option>
                        <option value="cocktail"              {{ old('type_evenement') == 'cocktail'              ? 'selected' : '' }}>Cocktail / Apéritif</option>
                        <option value="baby_shower"           {{ old('type_evenement') == 'baby_shower'           ? 'selected' : '' }}>Baby shower / Baptême</option>
                        <option value="evenement_pro"         {{ old('type_evenement') == 'evenement_pro'         ? 'selected' : '' }}>Événement professionnel</option>
                        <option value="autre"                 {{ old('type_evenement') == 'autre'                 ? 'selected' : '' }}>Autre fête</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nb_convives">Nombre de convives <span aria-label="obligatoire">*</span></label>
                    <input type="number" id="nb_convives" name="nb_convives"
                           value="{{ old('nb_convives') }}"
                           placeholder="Ex : 30"
                           min="1"
                           aria-required="true"
                           required>
                </div>
            </div>

            <div class="form-group">
                <label for="date_evenement">Date de l'événement</label>
                <input type="date" id="date_evenement" name="date_evenement"
                       value="{{ old('date_evenement') }}">
            </div>

            <div class="form-group">
                <label for="message">Votre message</label>
                <textarea id="message" name="message"
                          placeholder="Décrivez votre événement, vos envies, votre budget…">{{ old('message') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary form-submit">
                Envoyer ma demande ✦
            </button>

        </form>
    </div>

</section>