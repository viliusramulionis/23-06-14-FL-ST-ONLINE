import { BrowserRouter, Routes, Route } from 'react-router-dom';
import Container from './components/Container/Container';
import Home from './pages/Home';
import Post from './pages/Post';
import Dashboard from './pages/Dashboard';
import NewPost from './pages/NewPost';
import './App.css';

const App = () => {
  return (
    <BrowserRouter>
      <Container>
        <Routes>
          <Route path="/" element={<Home />} />
          <Route path="/post/:id" element={<Post />} />
          <Route path="/admin" element={<Dashboard />} />
          <Route path="/new-post" element={<NewPost />} />
        </Routes>
      </Container>
    </BrowserRouter>
  );
}

export default App;
