import { useParams } from "react-router-dom";
import { useEffect, useState } from "react";

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

    if (loading) return <p>Caricamento...</p>;
    if (notFound) return <p>Nessuna canzone trovata con il nome "{songName}".</p>;

    return (
        <div className="song-details">
            <h1>{song.title}</h1>
            <p><strong>Artista:</strong> {song.artist}</p>
            <p><strong>Album:</strong> {song.album.name} ({song.album.year})</p>
            <p><strong>Genere:</strong> {song.genre.name}</p>
            <p><strong>Descrizione album:</strong> {song.album.description}</p>
            <div>
                <a href={song.youtube_link} target="_blank" rel="noopener noreferrer">🎥 Ascolta su YouTube</a>
            </div>
            <div>
                <a href={song.spotify_link} target="_blank" rel="noopener noreferrer">🎧 Ascolta su Spotify</a>
            </div>
        </div>
    );
}
