import { createRoot } from 'react-dom/client';
import Sidebar from './components/Sidebar/Sidebar';
import './bootstrap';
import '../css/app.css';

const App = () => {
    return (
        <div className="container">
            <Sidebar />
        </div>
    )
}

const root = createRoot(document.getElementById('app'));

root.render(<App />);

