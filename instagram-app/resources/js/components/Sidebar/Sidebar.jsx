import logo from './logo.svg';
import './Sidebar.css';

const Sidebar = () => {
    return (
        <aside>
            <div className="logo">
                <img src={logo} />
            </div>
            <nav>
                <ul>
                    <li>Home</li>
                    <li>Search</li>
                </ul>
            </nav>
        </aside>
    );
} 

export default Sidebar;