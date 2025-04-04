import { BrowserRouter as Router, Route, Routes, BrowserRouter } from 'react-router-dom'
import './App.css'
import { GlobalProvider } from './context/GlobalContext'
import DefaultLayout from './Pages/DefaultLayout'
import Home from './Pages/Home'
import Albums from "./Pages/AlbumDetails"
import Songs from "./Pages/SongDetails"
import NotFound from './pages/NotFoundPage'
import Genres from './Pages/GenreDetails'

function App() {


  return (
    <>
      <GlobalProvider>
        <BrowserRouter >
          <Routes>
            <Route element={<DefaultLayout />} >
              <Route path="/" element={<Home />} />
              <Route path="/album/:albumName" element={<Albums />} />
              <Route path="/song/:songName" element={<Songs />} />
              <Route path="/genre/:genreName" element={<Genres />} />
              <Route path="*" element={<NotFound />} />
            </Route>
          </Routes>
        </BrowserRouter>
      </GlobalProvider>
    </>
  )
}

export default App
