import { useState } from 'react';
import axios from 'axios';
import Loader from '../Loader/Loader';
import './CommentForm.css';

const CommentForm = ({ id }) => { 
    const [showButton, setShowButton] = useState(false);
    const [loading, setLoading] = useState(false);

    const handleSubmit = (e) => {
        e.preventDefault();

        setLoading(true);

        const data = new FormData(e.target);

        axios.post('/api/post/comment/' + id, data)
        .then(resp => {
            setLoading(false);
            e.target.reset();
        });
    }

    return (
        <form 
            className="commentForm"
            onSubmit={handleSubmit}
        >
            {loading && <Loader height={80} />}
            <textarea 
                name="text" 
                placeholder="Add a comment"
                onKeyUp={(e) => {
                    e.target.value != '' ? setShowButton(true) : setShowButton(false)
                }}
            ></textarea>
            {showButton && <button>Post</button>}
        </form>
    )
}

export default CommentForm;