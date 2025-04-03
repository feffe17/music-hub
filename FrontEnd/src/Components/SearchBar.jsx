import { useState } from "react";
import { NavLink } from "react-router-dom";

export default function SearchBar({ onSearch }) {
    const [query, setQuery] = useState("");

    const handleSearch = () => {
        if (query.trim()) {
            onSearch(query);
        }
    };

    const handleReset = () => {
        window.location.reload();
    };

    return (
        <div className="input-group mt-3">
            <input
                type="text"
                placeholder="Cerca Album, Canzoni o Generi"
                className="form-control"
                value={query}
                onChange={(e) => setQuery(e.target.value)}
            />
            <button className="btn btn-primary" onClick={handleSearch}>Cerca</button>
            <button className="btn btn-secondary" onClick={handleReset}>Reset</button>
        </div>
    );
}
