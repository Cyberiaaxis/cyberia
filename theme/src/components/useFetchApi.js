import axios from "axios";
import { useCallback,useState } from "react";

export default function useFetchApi() {
    const [result, setResult] = useState([]);
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(false);

    const api = useCallback(async (url, options = {}) => {

        if (!url) throw new Error('URL required');

        console.log(url);

        setLoading(true);

        options['headers'] = {
            'Content-Type': 'application/json',
            Accept: 'application/json'
        }

        await axios(url, options)
            .then(res => {
                const result = res.data;
                setResult(result);
            })
            .catch(error => {
                console.log(error.response.data)
                setError(error.response.data);
            });

    }, []);

    // Return 'isLoading' not the 'setIsLoading' function
    return { result, loading, error, api };
};
