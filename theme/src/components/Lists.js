import React, { useEffect, useState } from 'react'
import axios from 'axios'
import Marquee from 'react-marquee-master'
import '../styles/Lists.scss'

export default function Example() {
  const [status, setStatus] = useState('idle')
  const [hasError, setErrors] = useState(false)
  const [responseData, setResponseData] = useState(null)

  const fetchData = async () => {
    setErrors(false)
    setStatus('fetching')
    await axios
      .get('http://criminalimpulse.com/api/topplayerlist')
      .then((response) => {
        if (response?.data?.length) {
          setResponseData(response.data)
          console.log('setResponseData: ', response.data)
        }
        setStatus('fetched')
      })
      .catch((error) => {
        setStatus('failed')
        setErrors(error)
        console.error(error)
      })
  }

  useEffect(() => {
    fetchData()
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [])

  return (
    <>
      <div height="300px" className="player-left">
        <p className="listHeading">Menu Heading</p>
        {responseData?.length ? (
          <Marquee minHeight="250" marqueeItems={responseData} />
        ) : (
          <div>loading...</div>
        )}
      </div>
      ,
      <div height="300px" className="player-right">
        <p className="listHeading">Menu Heading</p>
        {responseData?.length ? (
          <Marquee minHeight="250" marqueeItems={responseData} />
        ) : (
          <div>loading...</div>
        )}
      </div>
    </>
  )
}
