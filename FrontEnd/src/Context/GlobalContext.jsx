import { createContext, useState, useEffect } from "react";

export const GlobalContext = createContext();

export const GlobalProvider = ({ children }) => {
    const API_BASE_URL = "http://localhost:8000/api";

    const [albums, setAlbums] = useState([]);
    const [songs, setSongs] = useState([]);
    const [genres, setGenres] = useState([]);

    // Funzione generica per il fetch
    const fetchData = async (endpoint, setter) => {
        try {
            const response = await fetch(`${API_BASE_URL}/${endpoint}`);
            if (!response.ok) throw new Error("Errore nella richiesta");
            const data = await response.json();
            setter(data);
        } catch (error) {
            console.error("Errore nel fetch:", error);
        }
    };

    // Carica i dati all'avvio
    useEffect(() => {
        fetchData("albums", setAlbums);
        fetchData("songs", setSongs);
        fetchData("genres", setGenres);
    }, []);

    // Funzioni di ricerca
    const searchAlbums = async (name) => {
        fetchData(`albums/search/${name}`, setAlbums);
    };

    const searchSongs = async (name) => {
        fetchData(`songs/search/${name}`, setSongs);
    };

    const searchGenres = async (name) => {
        fetchData(`genres/search/${name}`, setGenres);
    };

    return (
        <GlobalContext.Provider
            value={{
                albums,
                songs,
                genres,
                searchAlbums,
                searchSongs,
                searchGenres,
            }}
        >
            {children}
        </GlobalContext.Provider>
    );
};
