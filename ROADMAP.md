# CraftAttack.xyz Projekt Roadmap

Dies ist die Roadmap für die Entwicklung der CraftAttack.xyz Fan-Plattform.
Sie beschreibt die geplanten Phasen und Features, um eine interaktive Community-Seite zu schaffen,
auf der Benutzer News und Twitch-Clips zu ihren favorisierten CraftAttack-Teilnehmern teilen und entdecken können.

## Technologischer Stack

*   **Backend:** Laravel (mit Laravel Breeze für Auth)
*   **Frontend:** Blade/Livewire (standardmäßig mit Breeze, optional Vue.js für komplexere Komponenten)
*   **Styling:** Tailwind CSS
*   **Datenbank:** MySQL / PostgreSQL
*   **Externe APIs:** Twitch API

## Phase 0: Setup & Core-Fundament (Vorbereitung für MVP)

*   [ ] **Projektinitialisierung:**
    *   [ ] Laravel Projekt aufsetzen.
    *   [ ] Laravel Breeze installieren und konfigurieren (Auth, Dashboard).
    *   [ ] Datenbankverbindung herstellen und erste Migrations (users, password_reset_tokens) ausführen.
    *   [ ] Grundlegendes Themeing mit Tailwind CSS anpassen.
*   [ ] **Twitch OAuth Integration:**
    *   [ ] Laravel Socialite installieren.
    *   [ ] Twitch Developer App erstellen (Client ID, Secret, Redirect URI).
    *   [ ] Login und Registrierung via Twitch implementieren, inkl. Speicherung von `twitch_id`, `twitch_token`, `twitch_refresh_token`.
    *   [ ] `users` Migration anpassen, um Twitch-spezifische Felder zu enthalten (UUID für ID).
*   [ ] **CraftAttack Teilnehmer Management:**
    *   [ ] Migration für `participants` Tabelle (id, name, twitch_id, image_url, description, etc.).
    *   [ ] Seedern der ersten CraftAttack-Teilnehmerdaten.
    *   [ ] Einfache interne Ansicht/CRUD für Admins (manuell oder über Laravel Tinker/Seeder vorerst).

## Phase 1: Minimum Viable Product (MVP) - Core Features

*   [ ] **Benutzer-Dashboard:**
    *   [ ] Nach dem Login: Anzeige eines leeren Zustands oder "Wählen Sie Ihre Teilnehmer aus".
    *   [ ] Integration zur Abfrage der Twitch-Follows des angemeldeten Benutzers (mit `user:read:follows` Scope).
    *   [ ] Speicherung der gefolgten/abonnierten CraftAttack-Teilnehmer als interne Relation (z.B. `user_followed_participants` Tabelle).
*   [ ] **News-System:**
    *   [ ] Migration für `news_items` Tabelle (id, user_id, participant_id, title, content, status, created_at, updated_at).
    *   [ ] Formular zum Einreichen von News (nur für angemeldete Benutzer).
    *   [ ] Anzeige des personalisierten News-Feeds: News der vom Benutzer gefolgten Teilnehmer.
    *   [ ] **Grundlegendes Report-System für News:** Benutzer können News melden (reportable_type: NewsItem, reportable_id).
    *   [ ] **Admin-Ansicht für News-Moderation:** Freigeben/Ablehnen/Löschen von News.
*   [ ] **Twitch-Clip Submission:**
    *   [ ] Migration für `clips` Tabelle (id, user_id, participant_id, twitch_clip_id, title, url, description, status, created_at, updated_at).
    *   [ ] Formular zum Einreichen von Twitch-Clip-URLs.
    *   [ ] Backend-Logik zur Validierung des Clips gegen die Twitch API (Teilnehmer-Check).
    *   [ ] Anzeige der genehmigten Clips im personalisierten Feed.
    *   [ ] **Grundlegendes Report-System für Clips:** Benutzer können Clips melden (reportable_type: Clip, reportable_id).
    *   [ ] **Admin-Ansicht für Clip-Moderation:** Freigeben/Ablehnen/Löschen von Clips.
*   [ ] **Admin-Panel (Grundfunktionen):**
    *   [ ] Grundlegende Ansicht für ausstehende News und Clips.
    *   [ ] Ansicht und Bearbeitung von Reports (Status ändern).

## Phase 2: Erweiterungen & Benutzer-Interaktion

*   [ ] **Verbesserter News- und Clip-Feed:**
    *   [ ] Filter- und Sortieroptionen im Feed (nach Datum, Popularität).
    *   [ ] Unendliches Scrollen oder Paginierung für den Feed.
*   [ ] **Kommentarfunktion:**
    *   [ ] Migration für `comments` Tabelle (id, user_id, commentable_type, commentable_id, content, created_at).
    *   [ ] Benutzer können Kommentare zu News und genehmigten Clips hinterlassen.
    *   [ ] Moderationsmöglichkeiten für Kommentare (Melden, Löschen durch Admin).
*   [ ] **Like/Reaction System:**
    *   [ ] Migration für `reactions` Tabelle (user_id, reactable_type, reactable_id, type).
    *   [ ] Benutzer können News und Clips "liken".
*   [ ] **Favoriten-Funktion:**
    *   [ ] Benutzer können News und Clips zu ihrer persönlichen Favoritenliste hinzufügen.
*   [ ] **Benutzerprofile (einfach):**
    *   [ ] Eine öffentliche Seite, die die vom Benutzer eingereichten News und Clips auflistet.
*   [ ] **Twitch/YouTube VOD/Highlight Submission:**
    *   [ ] Erweiterung des Clip-Submission-Systems, um auch Links zu längeren Videos zu unterstützen.
    *   [ ] Zusätzliche Validierung gegen YouTube API bei Bedarf.
*   [ ] **Optimierung:**
    *   [ ] Implementierung von Laravel Queues für Hintergrundprozesse (z.B. Twitch API Abfragen).
    *   [ ] Grundlegendes Caching für häufig abgerufene Daten.

## Phase 3: Community & Erweiterte Funktionalität

*   [ ] **Benachrichtigungen:**
    *   [ ] In-App Benachrichtigungen (z.B. "Dein Clip wurde genehmigt", "Neuer Kommentar zu deiner News").
    *   [ ] E-Mail Benachrichtigungen für wöchentliche Digests.
*   [ ] **Benutzerprofile (erweitert):**
    *   [ ] Anzeige von Benutzeraktivitäten (eingereichte Inhalte, Kommentare, Likes).
    *   [ ] Optionale "Über mich"-Sektion.
*   [ ] **"Meine Teilnehmer" Management:**
    *   [ ] Benutzer können ihre Liste der abonnierten/ausgewählten Teilnehmer manuell anpassen, auch unabhängig von Twitch-Follows.
*   [ ] **Search Funktionalität:**
    *   [ ] Full-Text Search für News-Titel und Clip-Beschreibungen.
*   [ ] **Gamification (optional):**
    *   [ ] Implementierung einfacher Badges für Meilensteine (z.B. "Erster Clip", "10 News eingereicht").
*   [ ] **Admin-Panel (vollständig):**
    *   [ ] Laravel Nova oder Filament Integration für ein umfassendes Admin-Interface.
    *   [ ] Detailliertes User-Management (Rollen, Sperren).
    *   [ ] Dashboard mit Statistiken.
*   [ ] **Performance & Skalierung:**
    *   [ ] Weitere Caching-Strategien.
    *   [ ] Optimierung von Datenbankabfragen.
    *   [ ] Vorbereitung für höhere Nutzerzahlen.

## Phase 4: Langfristige Vision & Experimente

*   [ ] **Integration weiterer Plattformen:** Z.B. Reddit, Twitter für News-Quellen.
*   [ ] **Community-Events/Projekte:** Eigene kleine Events auf der Plattform hosten.
*   [ ] **Open-API:** Bereitstellung einer (eingeschränkten) API für Entwickler.
*   [ ] **Mobile App:** Native oder PWA.

---

Diese Roadmap ist flexibel und wird basierend auf Feedback und Prioritäten angepasst.
