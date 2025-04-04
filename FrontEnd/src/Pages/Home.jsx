import { useContext, useState, useEffect } from "react";
import { GlobalContext } from "../context/GlobalContext";
import SearchBar from "../Components/SearchBar";

export default function Home() {
    const { albums, songs, genres, searchAlbums, searchSongs, searchGenres } = useContext(GlobalContext);
    const [results, setResults] = useState([]);
    const [hasSearched, setHasSearched] = useState(false);

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
                                    <li
                                        key={index}
                                        className="list-group-item d-flex justify-content-between align-items-center"
                                    >
                                        <span>{item.name || item.title}</span>
                                        <span className={`badge ${getBadgeClass(item.type)}`}>{item.type}</span>
                                    </li>
                                ))}
                            </ul>
                        ) : (
                            <p>Nessun risultato trovato</p>
                        )}
                    </div>
                </div>
            )}

            <div className="row mt-5">
                <div className="col-md-12">
                    <h2>Ultime Novità</h2>
                    {/* Qui puoi aggiungere le ultime novità musicali */}
                </div>
            </div>
        </div>
    );
}
