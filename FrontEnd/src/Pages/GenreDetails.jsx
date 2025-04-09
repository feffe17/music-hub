import { useParams, NavLink } from "react-router-dom";
import { useEffect, useState, useContext } from "react";
import { GlobalContext } from "../context/GlobalContext";
import { LineWobble } from "ldrs/react";
import { getAlbumById } from "../utils/helper";

export default function GenreDetails() {
    const { genreName } = useParams();
    const { albums } = useContext(GlobalContext);
    const [genre, setGenre] = useState(null);
    const [loading, setLoading] = useState(true);
    const [notFound, setNotFound] = useState(false);

    useEffect(() => {
        const fetchGenre = async () => {
            try {
                const response = await fetch(
                    `http://localhost:8000/api/genres/?name=${genreName}`
                );
                const data = await response.json();

                if (data.length > 0) {
                    setGenre(data[0]);
                    setNotFound(false);
                } else {
                    setNotFound(true);
                }
            } catch (error) {
                console.error("Errore nel recupero del genere:", error);
                setNotFound(true);
            } finally {
                setLoading(false);
            }
        };

        fetchGenre();
    }, [genreName]);

    if (loading) {
        return (
            <div className="text-center py-5">
                <LineWobble size="80" stroke="5" bgOpacity="0.1" speed="1.75" color="rgba(255, 20, 147, 1)" />
                <p className="mt-3">Caricamento...</p>
            </div>
        );
    }

    if (notFound || !genre) {
        return (
            <div className="text-center py-5">
                <p className="text-danger">
                    ❌ Nessun genere trovato con il nome <strong>"{decodeURIComponent(genreName)}"</strong>.
                </p>
            </div>
        );
    }

    return (
        <div className="container py-5">
            <h2 className="mb-4">Ecco tutte le canzoni del genere <strong>{genre.name}</strong></h2>

            {genre.songs && genre.songs.length > 0 ? (
                <ul className="list-group">
                    {genre.songs.map((song) => {
                        const album = getAlbumById(albums, song.album_id);
                        return (
                            <li key={song.id} className="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <NavLink
                                        to={`/song/${encodeURIComponent(song.title)}`}
                                        className="text-decoration-none fw-bold me-3"
                                    >
                                        🎵 {song.title}
                                    </NavLink>
                                </div>
                                <div>
                                    {album && (
                                        <NavLink
                                            to={`/album/${encodeURIComponent(album.name)}`}
                                            className="text-decoration-none text-secondary"
                                        >
                                            {album.name} 💿
                                        </NavLink>
                                    )}
                                </div>
                            </li>
                        );
                    })}
                </ul>
            ) : (
                <p>Non ci sono canzoni associate a questo genere.</p>
            )}
        </div>
    );
}
