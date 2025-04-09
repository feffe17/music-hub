import { useContext, useState, useEffect } from "react";
import { GlobalContext } from "../context/GlobalContext";
import SearchBar from "../Components/SearchBar";
import { NavLink } from "react-router-dom";
import Card from 'react-bootstrap/Card';
import { getBadgeClass, getLinkPath, getLatestSongs, getLatestAlbums } from "../utils/helper";


export default function Home() {
    const { albums, songs, genres, searchAlbums, searchSongs, searchGenres } = useContext(GlobalContext);
    const [results, setResults] = useState([]);
    const [hasSearched, setHasSearched] = useState(false);

    const handleSearch = async (query) => {
        await Promise.all([
            searchAlbums(query),
            searchSongs(query),
            searchGenres(query),
        ]);
        setHasSearched(true);
    };

    useEffect(() => {
        if (hasSearched) {
            setResults([...albums, ...songs, ...genres]);
        }
    }, [albums, songs, genres]);


    const latestAlbums = getLatestAlbums(albums);
    const latestSongs = getLatestSongs(songs);

    return (
        <div className="container">
            <h1 className="text-center mt-5">Benvenuto su Music Hub</h1>
            <p className="text-center">Esplora la tua musica preferita!</p>

            <SearchBar onSearch={handleSearch} />

            {hasSearched && (
                <div className="row mt-5">
                    <div className="col-md-12">
                        <h2>Risultati della ricerca</h2>
                        {results.length > 0 ? (
                            <ul className="list-group">
                                {results.map((item, index) => (
                                    <NavLink
                                        to={getLinkPath(item)}
                                        key={index}
                                        className="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                    >
                                        <span>{item.name || item.title}</span>
                                        <span className={`badge ${getBadgeClass(item.type)}`}>
                                            {item.type}
                                        </span>
                                    </NavLink>
                                ))}
                            </ul>
                        ) : (
                            <p>Nessun risultato trovato</p>
                        )}
                    </div>
                </div>
            )}

            <h1 className="mt-5">Ultime Novità</h1>
            <div className="row">
                <h3 className="mt-3">Ultimi Album</h3>
                {latestAlbums.map((album) => (
                    <div className="col-md-4 mb-3" key={album.id}>
                        <NavLink to={`/album/${encodeURIComponent(album.name)}`} className="text-decoration-none">
                            <Card className="h-100 shadow-sm rounded border-0 hover-shadow transition">
                                <Card.Body>
                                    <Card.Title className="mb-2">
                                        <strong>{album.name}</strong>
                                    </Card.Title>
                                    <Card.Text className="mb-1">🎤 Artista: {album.artist}</Card.Text>
                                    <Card.Text className="mb-1">📅 Anno: {album.year}</Card.Text>
                                    {album.description && (
                                        <Card.Text className="text-muted"><em>{album.description}</em></Card.Text>
                                    )}
                                </Card.Body>
                            </Card>

                        </NavLink>
                    </div>
                ))}
            </div>

            <div className="row mt-4">
                <h3 className="mt-3">Ultime Canzoni</h3>
                {latestSongs.map((song) => (
                    <div className="col-md-4 mb-3" key={song.id}>
                        <NavLink to={`/song/${encodeURIComponent(song.title)}`} className="text-decoration-none">
                            <Card className="h-100 shadow-sm rounded border-0 hover-shadow transition">
                                <Card.Body>
                                    <Card.Title className="mb-2">
                                        <strong>{song.title}</strong>
                                    </Card.Title>
                                    <Card.Text className="mb-1">🎤 Artista: {song.artist}</Card.Text>
                                    <Card.Text className="mb-1">📅 Data di uscita: {song.release_date}</Card.Text>
                                </Card.Body>
                            </Card>

                        </NavLink>
                    </div>
                ))}
            </div>
        </div>
    );
}
