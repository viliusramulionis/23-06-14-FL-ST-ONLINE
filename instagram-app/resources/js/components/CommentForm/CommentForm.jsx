import { useState } from 'react';
import axios from 'axios';
import './CommentForm.css';

const CommentForm = ({ id }) => { 
    const [showButton, setShowButton] = useState(false);

    const handleSubmit = (e) => {
        e.preventDefault();

        const data = new FormData(e.target);

        axios.post('/api/post/comment/' + id, data)
        .then(resp => console.log(resp));
    }

    return (
        <form 
            className="commentForm"
            onSubmit={handleSubmit}
        >
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