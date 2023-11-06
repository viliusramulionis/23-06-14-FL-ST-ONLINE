import { useState } from 'react';
import axios from 'axios';

const NewPost = () => {
    const [fieldsCount, setFieldsCount] = useState(0);
    
    const generateFields = () => {
        const fields = [];

        for(let i = 0; i < fieldsCount; i++) {
            fields[fields.length] = (
                <input key={i} type="file" name="resources[]" />
            )
        }

        return fields;
    }

    const sendData = (e) => {
        e.preventDefault();

        const data = new FormData(e.target);

        axios.post('/api/post', data, {
            headers: {
                "Content-Type" : "multipart/form-data"
            }
        })
        .then(resp => console.log(resp));
    }

    return (
        <form onSubmit={sendData}>
            <div>
                <textarea name="description"></textarea>
            </div>
            <div>
                <input type="text" name="location" />
            </div>
            <div>
                <div className="addPhoto" onClick={() => setFieldsCount(fieldsCount + 1) }>Pridėti nuotrauką</div>
            </div>
            {generateFields()}
            <button>Send Data</button>
        </form>
    )
}

export default NewPost;