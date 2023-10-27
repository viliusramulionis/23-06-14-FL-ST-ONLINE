import { useState, useEffect } from 'react';
import axios from 'axios';
import Post from '../components/Post/Post';

const Home = () => {
    const [data, setData] = useState([]);
    
    useEffect(() => {
        axios.get('/api/post')
        .then(resp => setData(resp.data));
    }, []);

    return (
        <div className="stream">
            {data.map(value => <Post key={value.id} data={value} />)}
        </div>
    );
}

export default Home;