import { useParams } from "react-router-dom";
import { useEffect, useState } from "react";
import { LineWobble } from 'ldrs/react'
import 'ldrs/react/LineWobble.css'


export default function SongDetails() {
    const { songName } = useParams();
    const [song, setSong] = useState(null);
    const [loading, setLoading] = useState(true);
    const [notFound, setNotFound] = useState(false);

    useEffect(() => {
        const fetchSong = async () => {
            try {
                const response = await fetch(`http://localhost:8000/api/songs/?name=${songName}`);
                const data = await response.json();
                if (data.length > 0) {
                    setSong(data[0]);
                    setNotFound(false);
                } else {
                    setNotFound(true);
                }
            } catch (error) {
                console.error("Errore nel recupero della canzone:", error);
                setNotFound(true);
            } finally {
                setLoading(false);
            }
        };

        fetchSong();
    }, [songName]);

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
                <p className="text-danger">❌ Nessuna canzone trovata con il nome <strong>"{songName}"</strong>.</p>
            </div>
        );
    }

    return (
        <div className="container py-5">
            <div className="card shadow-lg border-0">
                <div className="card-body">
                    <h2 className="mb-4">{song.title}</h2>
                    <h4 className="text-muted mb-3">Artista: {song.artist}</h4>

                    {song.album && (
                        <div className="mb-4">
                            <h5 className="mb-1">Album:</h5>
                            <p><strong>{song.album.name}</strong> ({song.album.year})</p>
                            {song.album.description && (
                                <p className="text-muted">{song.album.description}</p>
                            )}
                        </div>
                    )}

                    {song.genre && (
                        <div className="mb-3">
                            <h5>Genere:</h5>
                            <p className="badge bg-secondary">{song.genre.name}</p>
                        </div>
                    )}

                    <div className="d-flex gap-3 mt-4">
                        {song.youtube_link && (
                            <a
                                href={song.youtube_link}
                                target="_blank"
                                rel="noreferrer"
                                className="btn btn-outline-danger"
                            >
                                🎬 Guarda su YouTube
                            </a>
                        )}
                        {song.spotify_link && (
                            <a
                                href={song.spotify_link}
                                target="_blank"
                                rel="noreferrer"
                                className="btn btn-outline-success"
                            >
                                🎧 Ascolta su Spotify
                            </a>
                        )}
                    </div>
                </div>
            </div>
        </div>
    );
}
