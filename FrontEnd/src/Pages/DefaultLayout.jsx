import { Outlet } from "react-router-dom"
import { NavLink } from "react-router-dom";


export default function DefaultLayout() {
    return (
        <>
            <header>
                <nav className="navbar navbar-expand-md navbar-light bg-white shadow-sm px-3">
                    {/* <div className="container"> */}
                    <a className="navbar-brand " href="/">
                        <div className="logo d-flex align-items-center">
                            <svg width="100" height="100" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" fill="none">
                                <circle cx="100" cy="100" r="90" fill="#1E90FF" stroke="#8A2BE2" strokeWidth="10" />
                                <path d="M70 70 L130 50 L130 140 Q110 130 90 140 T70 140 Z" fill="#FF1493" stroke="#2C2C2C" strokeWidth="5" />

                            </svg>
                            <h1 className="m-0">Music Hub</h1>
                        </div>
                    </a>
                    {/* </div> */}
                </nav >
            </header >

            <main>
                <Outlet />
            </main>
        </>
    );
};

