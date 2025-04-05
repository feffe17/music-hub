import { useParams, NavLink } from 'react-router-dom';
import { useEffect, useState } from 'react';
import { LineWobble } from 'ldrs/react';  // Importiamo il loader

export default function Albums() {
    const { albumName } = useParams(); // Recuperiamo il parametro "albumName" dalla route
    const [album, setAlbum] = useState(null);
    const [loading, setLoading] = useState(true);
    const [notFound, setNotFound] = useState(false);

    useEffect(() => {
        const fetchAlbum = async () => {
            try {
                const response = await fetch(`http://localhost:8000/api/albums/?name=${albumName}`);
                const data = await response.json();

                if (data.length > 0) {
                    setAlbum(data[0]);
                    setNotFound(false);
                } else {
                    setNotFound(true);
                }
            } catch (error) {
                console.error("Errore nel recupero dell'album:", error);
                setNotFound(true);
            } finally {
                setLoading(false);
            }
        };

        fetchAlbum();
    }, [albumName]);

    if (loading) {
        return (
            <div className="text-center py-5">
                <LineWobble
                    size="80"
                    stroke="5"
                    bgOpacity="0.1"
                    speed="1.75"
                    color="rgba(255, 20, 147, 1)"
                />
                <p className="mt-3">Caricamento...</p>
            </div>
        );
    }

    if (notFound) {
        return (
            <div className="text-center py-5">
                <p className="text-danger">❌ Nessun album trovato con il nome <strong>"{albumName}"</strong>.</p>
            </div>
        );
    }

    return (
        <div className="container py-5">
            <div className="card shadow-lg border-0">
                <div className="card-body">
                    <h2 className="mb-4">{album.name}</h2>
                    <h4 className="text-muted mb-3">Artista: {album.artist}</h4>
                    <p><strong>Anno:</strong> {album.year}</p>
                    <p><strong>Descrizione:</strong> {album.description}</p>

                    {album.songs && album.songs.length > 0 && (
                        <div className="mt-4">
                            <h5 className="mb-3">Canzoni:</h5>
                            <ul className="list-unstyled">
                                {album.songs.map((song) => (
                                    <li key={song.id} className="mb-2">
                                        <NavLink
                                            to={`/song/${song.title}`} // Usando NavLink per la navigazione
                                            className="text-decoration-none"

                                        >

                                            <i className="bi bi-music-note-beamed"></i> {song.title}
                                        </NavLink>
                                    </li>
                                ))}
                            </ul>
                        </div>
                    )}
                </div>
            </div>
        </div>
    );
}
