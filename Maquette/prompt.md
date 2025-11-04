# Organized Maquette Prompt: Ouarzazate – Cinéma Atlas Blog

After reading and processing the use case diagram and the list of features provided, this document organizes the requirements for creating a modern and responsive HTML + Tailwind CSS mockup for the blog "Ouarzazate – Cinéma Atlas".

## 1. Public Side (for Touriste Culturel)

**Goal:**
Allow visitors (mainly tourists and cinema enthusiasts) to explore Ouarzazate’s cinematic heritage and plan visits to local studios and attractions.

**Design Guidelines:**
*   **Visual Theme:** Inspired by desert landscapes, film studios, and the cinematic aura of Ouarzazate.
*   **Color Palette:** Warm tones (ochre, sand, bronze, dark blacks).
*   **Architectural Accents:** Subtle Moroccan accents (geometric borders, calligraphy-inspired typography).
*   **Prioritization:** Mobile-first, simple, and offline-friendly layouts.

**Sections to Include:**

### Header / Navbar
*   **Logo:** “Cinéma Atlas Ouarzazate”
*   **Menu Links:** “Accueil”, “Histoire du cinéma”, “Studios & Lieux”, “Blog”, “Contact”
*   **Utilities:** Search bar and language switcher (FR/EN)

### Hero Section
*   **Background:** Image of Ouarzazate studios or desert.
*   **Title:** “Découvrez la magie du cinéma à Ouarzazate”
*   **CTA Buttons:** “Explorer le patrimoine” and “Planifier ma visite”

### Featured Articles / Videos
*   **Layout:** Grid of cards with images, titles, and short descriptions.
*   **Buttons:** “Lire l’article” / “Regarder la vidéo”, “Sauvegarder”, “Partager”

<!-- ### Young Creator Hub (for Jeune Créateur)
*   **Goal:** Provide resources for aspiring filmmakers and artists.
*   **Layout:** Sections for "Tutoriels", "Opportunités (stages, financements)", and "Projets de la communauté".
*   **Content:** Cards for tutorials, listings for opportunities, and a gallery for community projects.
*   **Buttons:** "Voir tous les tutoriels", "Soumettre un projet".

### Cultural Map / Info Section
*   **Map:** Small map of Ouarzazate with main film studios highlighted.
*   **Text:** Short text about the city’s cinematic heritage.

### Footer
*   **Links:** “À propos”, “Mentions légales”, “Réseaux sociaux”
*   **Contact:** Contact email and copyright. -->

## 2. Private Side (for Admin)

**Goal:**
Enable administrators to manage articles, videos, users, and events.

**Design Guidelines:**
*   **Color Palette:** Same as public side, slightly darker for a dashboard feel.
*   **Components:** Use Tailwind CSS components (cards, tables, modals, buttons, alerts).
*   **Layout:** Include a sidebar navigation layout.

**Sections to Include:**

### Login Page
*   **Layout:** Simple centered login card.
*   **Fields:** Email and password fields.
*   **Button:** “Connexion”

### Admin Dashboard
*   **Sidebar Navigation Links:**
    *   Tableau de bord
    *   Gestion des articles (incluant rédaction, modification, publication)
*   **Main Content Area:**
    *   Quick stats (total articles, users, upcoming events).
    *   Table for managing items with “Edit” and “Delete” buttons.
    *   Button to “Ajouter un nouvel article / événement”.

## Technical Details

*   **Styling:** Use Tailwind CSS for all styling.
*   **HTML Structure:** Apply HTML5 semantic structure (header, nav, main, section, footer).
*   **Modularity:** Components must be modular and reusable.
*   **Responsiveness:** Ensure responsive design for mobile, tablet, and desktop.
*   **Animations:** Include minimal animations using Tailwind transitions.

## Optional Enhancements

*   Subtle motion effects (fade-in, parallax) for hero and cards.
*   Use Lucide or Font Awesome icons for UI elements (search, edit, share).
*   Add a dark mode toggle for accessibility.
*   Use the Tailwind Typography plugin for article readability.

## Output Format

Generate the following files:
*   [`index.html`](Maquette/index.html): Public homepage
*   [`article.html`](Maquette/article.html): Example article page
*   [`dashboard.html`](Maquette/admin_dashboard.html): Admin main panel
*   [`login.html`](Maquette/admin_login.html): Admin login page
*   [`admin_articles_list.html`](Maquette/admin_articles_list.html): Admin articles list page
*   [`admin_article_edit.html`](Maquette/admin_article_edit.html): Admin article edit page
*   [`blog.html`](Maquette/blog.html): Public blog listing page
*   [`user_login.html`](Maquette/user_login.html): Public user login page

Each page should be well-commented, with clear section labels for easy iteration.

## Theme Inspiration

The design should evoke:
*   The cinematic heritage of Ouarzazate (“Hollywood of Africa”)
*   The identity of Atlas Studios
*   A blend of modern digital storytelling and traditional Moroccan aesthetics