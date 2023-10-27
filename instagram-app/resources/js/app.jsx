import { createRoot } from 'react-dom/client';
import Sidebar from './components/Sidebar/Sidebar';
import Home from './pages/Home';
import './bootstrap';
import '../css/app.css';

const App = () => {
    return (
        <div className="container d-flex">
            <Sidebar />
            <main className="d-flex justify-content-center">
                <Home />
            </main>
        </div>
    )
}

const root = createRoot(document.getElementById('app'));

root.render(<App />);

