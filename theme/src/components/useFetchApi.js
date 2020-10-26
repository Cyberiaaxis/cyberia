import axios from "axios";
import { useEffect, useState } from "react";

const useFetchApi = (url,method = 'get') => {
    const [data, setData] = useState([]);

    useEffect(() => {
        if (!url) return;

        const config = {
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json'
            }
        }

        const fetchData = async () => {
            await axios.get(url,config)
            .then(res => {
                const result = res.data;
                setData(result);
            })
            .catch(err => {
                console.log(err);
            });
        };

        fetchData();
    }, [url]);

    return { data };
};

export default useFetchApi;
