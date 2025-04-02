import { BrowserRouter as Router, Route, Routes, BrowserRouter } from 'react-router-dom'
import './App.css'
import { GlobalProvider } from './context/GlobalContext'
import DefaultLayout from './components/layouts/DefaultLayout'
import Home from './pages/Home'
import Albums from "./Pages/AlbumDetails"
import Songs from "./Pages/SongDetails"

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
              {/* <Route path="/genres" element={<Genres />} /> */}
            </Route>
          </Routes>
        </BrowserRouter>
      </GlobalProvider>
    </>
  )
}

export default App
