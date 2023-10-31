import { useEffect, useState } from 'react';
import axios from 'axios';
import { BiX } from "react-icons/bi";
import CommentForm from '../CommentForm/CommentForm';
import Comment from '../Comment/Comment';
import './SinglePost.css';


const SinglePost = ({ id, setShowCard }) => {
    const [data, setData] = useState(false);

    useEffect(() => {
        axios.get('/api/post/' + id)
        .then(resp => {
            console.log(resp.data[0]);
            setData(resp.data[0])
        });
    }, []);

    return data && (
        <div className="singlePost">
            <button 
                className="closeButton"
                onClick={() => setShowCard(false)}
            >
                <BiX style={{ width: 50, height: 50, color: 'white' }}/>
            </button>
            <div className="contents">
                <div className="photo">
                    <img src={data.file} alt={data.description} />
                </div>
                <div className="postData">
                    <div className="profile d-flex">
                        {data.users.photo && <img src={data.users.photo} />}
                        <div className="info">
                            <div className="user">{data.users.name}</div>
                            <div className="location">{data.location}</div>
                        </div>
                    </div>
                    <div className="comments">
                        {data.comments.map((comment, index) => 
                            <Comment key={index} data={comment} />
                        )}
                    </div>
                    <CommentForm />
                </div>
            </div>
        </div>
    );
}

export default SinglePost;