import { createContext, useState, useEffect } from "react";
import { data } from "react-router-dom";

export const GlobalContext = createContext();

export const GlobalProvider = ({ children }) => {
    const API_BASE_URL = "http://localhost:8000/api";

    const [albums, setAlbums] = useState([]);
    const [songs, setSongs] = useState([]);
    const [genres, setGenres] = useState([]);

    // Funzione generica per il fetch
    const fetchData = async (endpoint, setter, transform = null) => {
        try {
            const response = await fetch(`${API_BASE_URL}/${endpoint}`);
            if (!response.ok) throw new Error("Errore nella richiesta");
            const data = await response.json();
            setter(transform ? transform(data) : data);
        } catch (error) {
            console.error("Errore nel fetch:", error);
        }
    };

    // Carica i dati all'avvio
    useEffect(() => {
        fetchData("albums", setAlbums, (data) =>
            data.map((item) => ({ ...item, type: "Album" }))
        );
        fetchData("songs", setSongs, (data) =>
            data.map((item) => ({ ...item, type: "Song" }))
        );
        fetchData("genres", setGenres, (data) =>
            data.map((item) => ({ ...item, type: "Genre" }))
        );
    }, []);

    // Funzioni di ricerca
    const searchAlbums = async (name) => {
        setAlbums([]);
        await fetchData(`albums?name=${name}`, setAlbums, (data) =>
            data.map((item) => ({ ...item, type: "Album" }))
        );
    };

    const searchSongs = async (name) => {
        setSongs([]);
        await fetchData(`songs?name=${name}`, setSongs, (data) =>
            data.map((item) => ({ ...item, type: "Song" }))
        );
    };

    const searchGenres = async (name) => {
        setGenres([]);
        await fetchData(`genres?name=${name}`, setGenres, (data) =>
            data.map((item) => ({ ...item, type: "Genre" }))
        );
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
