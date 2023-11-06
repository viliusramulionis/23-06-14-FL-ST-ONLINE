import { createRoot } from 'react-dom/client';
import { BrowserRouter, Routes, Route } from 'react-router-dom'; 
import Sidebar from './components/Sidebar/Sidebar';
import Home from './pages/Home';
import NewPost from './pages/NewPost';
import './bootstrap';
import '../css/app.css';

const App = () => {
    return (
        <BrowserRouter>
            <div className="container d-flex">
                <Sidebar />
                <main className="d-flex justify-content-center">
                    <Routes>
                        <Route path="/" element={<Home />}/>
                        <Route path="/new-post" element={<NewPost />}/>
                    </Routes>
                </main>
            </div>
        </BrowserRouter>
    )
}

const root = createRoot(document.getElementById('app'));

root.render(<App />);

