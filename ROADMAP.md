# CraftAttack.xyz Projekt Roadmap

Dies ist die Roadmap für die Entwicklung der CraftAttack.xyz Fan-Plattform.
Sie beschreibt die geplanten Phasen und Features, um eine interaktive Community-Seite zu schaffen,
auf der Benutzer News und Twitch-Clips zu ihren favorisierten CraftAttack-Teilnehmern teilen und entdecken können.

## Technologischer Stack

*   **Backend:** Laravel (mit Laravel Socialite für Auth)
*   **Frontend:** Blade (kein Vue.js oder Livewire)
*   **Styling:** Tailwind CSS (mit Dark Mode & Light Mode Unterstützung)
*   **Datenbank:** MySQL / MariaDB
*   **Externe APIs:** Twitch API

## Phase 0: Setup & Core-Fundament (Vorbereitung für MVP)

*   [ ] **Projektinitialisierung:**
    *   [x] Laravel Projekt aufsetzen.
    *   [x] Tailwind CSS installieren und konfigurieren, **inklusive Dark Mode / Light Mode Umschaltung.**
    *   [ ] Datenbankverbindung herstellen und erste Migrations ausführen.
*   [ ] **Twitch OAuth Integration:**
    *   [ ] Laravel Socialite installieren.
    *   [ ] Twitch Developer App erstellen (Client ID, Secret, Redirect URI).
    *   [ ] Login und Registrierung via Twitch implementieren, inkl. Speicherung von `twitch_id`, `twitch_token`, `twitch_refresh_token`.
    *   [ ] `users` Migration anpassen, um Twitch-spezifische Felder zu enthalten (UUID für ID).
    *   [ ] Grundlegende Authentifizierungsflows (Login, Logout, Registrierung) mit Socialite.
*   [ ] **CraftAttack Teilnehmer Management:**
    *   [ ] Migration für `participants` Tabelle (id, name, twitch_id, image_url, description, etc.).
    *   [ ] Seedern der ersten CraftAttack-Teilnehmerdaten.
    *   [ ] Einfache Admin-Ansicht/CRUD für Teilnehmer-Verwaltung (manuell oder erste Blade-Views).

## Phase 1: Minimum Viable Product (MVP) - Core Features

*   [ ] **Benutzer-Dashboard:**
    *   [ ] Nach dem Login: Anzeige eines "Willkommen" oder "Wählen Sie Ihre Teilnehmer aus".
    *   [ ] Integration zur Abfrage der Twitch-Follows des angemeldeten Benutzers (mit `user:read:follows` Scope).
    *   [ ] Speicherung der gefolgten/abonnierten CraftAttack-Teilnehmer als interne Relation (z.B. `user_followed_participants` Tabelle).
*   [ ] **News-System:**
    *   [ ] Migration für `news_items` Tabelle (id, user_id, participant_id, title, content, status, created_at, updated_at).
    *   [ ] Blade-Formular zum Einreichen von News (nur für angemeldete Benutzer).
    *   [ ] Anzeige des personalisierten News-Feeds: News der vom Benutzer gefolgten Teilnehmer (Blade-Ansicht).
    *   [ ] **Grundlegendes Report-System für News:** Benutzer können News melden (reportable_type: NewsItem, reportable_id, Blade-Formular).
    *   [ ] **Admin-Ansicht für News-Moderation:** Freigeben/Ablehnen/Löschen von News.
*   [ ] **Twitch-Clip Submission:**
    *   [ ] Migration für `clips` Tabelle (id, user_id, participant_id, twitch_clip_id, title, url, description, status, created_at, updated_at).
    *   [ ] Blade-Formular zum Einreichen von Twitch-Clip-URLs.
    *   [ ] Backend-Logik zur Validierung des Clips gegen die Twitch API (Teilnehmer-Check).
    *   [ ] Anzeige der genehmigten Clips im personalisierten Feed (Blade-Ansicht).
    *   [ ] **Grundlegendes Report-System für Clips:** Benutzer können Clips melden (reportable_type: Clip, reportable_id, Blade-Formular).
    *   [ ] **Admin-Ansicht für Clip-Moderation:** Freigeben/Ablehnen/Löschen von Clips.
*   [ ] **Admin-Panel (Grundfunktionen):**
    *   [ ] Grundlegende Blade-Ansicht für ausstehende News und Clips.
    *   [ ] Ansicht und Bearbeitung von Reports (Status ändern) über Blade-Formulare.

## Phase 2: Erweiterungen & Benutzer-Interaktion

*   [ ] **Verbesserter News- und Clip-Feed:**
    *   [ ] Filter- und Sortieroptionen im Feed (nach Datum, Popularität, über Formular-Submit und vollständigen Seitenreload).
    *   [ ] Paginierung für den Feed.
*   [ ] **Kommentarfunktion:**
    *   [ ] Migration für `comments` Tabelle (id, user_id, commentable_type, commentable_id, content, created_at).
    *   [ ] Benutzer können Kommentare zu News und genehmigten Clips hinterlassen (Blade-Formular).
    *   [ ] Moderationsmöglichkeiten für Kommentare (Melden, Löschen durch Admin).
*   [ ] **Like/Reaction System:**
    *   [ ] Migration für `reactions` Tabelle (user_id, reactable_type, reactable_id, type).
    *   [ ] Benutzer können News und Clips "liken" (via Formular-Submit, ggf. JavaScript für ein besseres UX, aber ohne Framework).
*   [ ] **Favoriten-Funktion:**
    *   [ ] Benutzer können News und Clips zu ihrer persönlichen Favoritenliste hinzufügen (via Formular-Submit).
*   [ ] **Benutzerprofile (einfach):**
    *   [ ] Eine öffentliche Blade-Seite, die die vom Benutzer eingereichten News und Clips auflistet.
*   [ ] **Twitch/YouTube VOD/Highlight Submission:**
    *   [ ] Erweiterung des Clip-Submission-Systems, um auch Links zu längeren Videos zu unterstützen.
    *   [ ] Zusätzliche Validierung gegen YouTube API bei Bedarf.
*   [ ] **Optimierung:**
    *   [ ] Implementierung von Laravel Queues für Hintergrundprozesse (z.B. Twitch API Abfragen).
    *   [ ] Grundlegendes Caching für häufig abgerufene Daten.

## Phase 3: Community & Erweiterte Funktionalität

*   [ ] **Benachrichtigungen:**
    *   [ ] E-Mail Benachrichtigungen für wöchentliche Digests.
*   [ ] **Benutzerprofile (erweitert):**
    *   [ ] Anzeige von Benutzeraktivitäten (eingereichte Inhalte, Kommentare, Likes).
    *   [ ] Optionale "Über mich"-Sektion.
*   [ ] **"Meine Teilnehmer" Management:**
    *   [ ] Benutzer können ihre Liste der abonnierten/ausgewählten Teilnehmer manuell anpassen, auch unabhängig von Twitch-Follows (Blade-Formular).
*   [ ] **Search Funktionalität:**
    *   [ ] Full-Text Search für News-Titel und Clip-Beschreibungen (Formular-basierte Suche).
*   [ ] **Gamification (optional):**
    *   [ ] Implementierung einfacher Badges für Meilensteine (z.B. "Erster Clip", "10 News eingereicht").
*   [ ] **Admin-Panel (vollständig):**
    *   [ ] Laravel Nova oder Filament Integration (falls doch gewünscht und als Ausnahme von "No Livewire/Vue" akzeptiert) ODER komplett maßgeschneidertes Blade-basiertes Admin-Panel.
    *   [ ] Detailliertes User-Management (Rollen, Sperren).
    *   [ ] Dashboard mit Statistiken.
*   [ ] **Performance & Skalierung:**
    *   [ ] Weitere Caching-Strategien.
    *   [ ] Optimierung von Datenbankabfragen.
    *   [ ] Vorbereitung für höhere Nutzerzahlen.

## Phase 4: Langfristige Vision & Experimente

*   [ ] **Integration weiterer Plattformen:** Z.B. Reddit, Twitter für News-Quellen.
*   [ ] **Community-Events/Projekte:** Eigene kleine Events auf der Plattform hosten.
*   [ ] **Open-API:** Bereitstellung einer (eingeschränkten) API für Entwickler (für externe Konsumierung, nicht für die eigene Frontend-Nutzung).
*   [ ] **Mobile App:** Native oder PWA (separates Frontend-Projekt).

---

Diese Roadmap ist flexibel und wird basierend auf Feedback und Prioritäten angepasst.
