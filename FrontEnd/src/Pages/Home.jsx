import { useContext, useState, useEffect } from "react";
import { GlobalContext } from "../context/GlobalContext";
import SearchBar from "../Components/SearchBar";
import { NavLink } from "react-router-dom";
import Card from 'react-bootstrap/Card';


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


    const getBadgeClass = (type) => {
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
    }

    const getLinkPath = (item) => {
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

    const latestSongs = [...songs]
        .sort((a, b) => new Date(b.release_date) - new Date(a.release_date))
        .slice(0, 3);

    const latestAlbums = [...albums]
        .sort((a, b) => parseInt(b.year) - parseInt(a.year))
        .slice(0, 3);


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

            {/* <div className="row mt-5">
                <div className="col-md-12">
                    <h2>Ultime Novità</h2>
                    
                </div>
            </div> */}
            <h1 className="mt-5">Ultime Novità</h1>
            <div className="row">
                <h3 className="mt-3">Ultimi Album</h3>
                {latestAlbums.map((album) => (
                    <div className="col-md-4 mb-3" key={album.id}>
                        <Card>
                            <Card.Body>
                                <Card.Title><strong>{album.name}</strong></Card.Title>
                                <Card.Text>Artista: {album.artist}</Card.Text>
                                <Card.Text>Anno: {album.year}</Card.Text>
                                {album.description && (
                                    <Card.Text><em>{album.description}</em></Card.Text>
                                )}
                            </Card.Body>
                        </Card>
                    </div>
                ))}
            </div>

            <div className="row mt-4">
                <h3 className="mt-3">Ultime Canzoni</h3>
                {latestSongs.map((song) => (
                    <div className="col-md-4 mb-3" key={song.id}>
                        <Card>
                            <Card.Body>
                                <Card.Title><strong>{song.title}</strong></Card.Title>
                                <Card.Text>Artista: {song.artist}</Card.Text>
                                <Card.Text>Data di uscita: {song.release_date}</Card.Text>
                                <Card.Text>
                                    <a href={song.youtube_link} target="_blank" rel="noopener noreferrer">YouTube</a> |{" "}
                                    <a href={song.spotify_link} target="_blank" rel="noopener noreferrer">Spotify</a>
                                </Card.Text>
                            </Card.Body>
                        </Card>
                    </div>
                ))}
            </div>
        </div>
    );
}
