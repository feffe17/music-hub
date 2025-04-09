
// Restituisce la classe Bootstrap del badge in base al tipo
export const getBadgeClass = (type) => {
    switch (type) {
        case "Album":
            return "bg-primary";
        case "Song":
            return "bg-success";
        case "Genre":
            return "bg-warning text-dark";
        default:
            return "bg-secondary";
    }
};

// Costruisce il percorso corretto per i dettagli di un elemento
export const getLinkPath = (item) => {
    const name = encodeURIComponent(item.name || item.title);
    switch (item.type) {
        case "Album":
            return `/album/${name}`;
        case "Song":
            return `/song/${name}`;
        case "Genre":
            return `/genre/${name}`;
        default:
            return "#";
    }
};

// Ordina e restituisce i primi 3 album più recenti
export const getLatestAlbums = (albums) => {
    return [...albums]
        .sort((a, b) => parseInt(b.year) - parseInt(a.year))
        .slice(0, 3);
};

// Ordina e restituisce le ultime 3 canzoni per data di uscita
export const getLatestSongs = (songs) => {
    return [...songs]
        .sort((a, b) => new Date(b.release_date) - new Date(a.release_date))
        .slice(0, 3);
};

// Recupera album per ID da una lista
export const getAlbumById = (albums, id) => {
    return albums.find((album) => album.id === id);
};
