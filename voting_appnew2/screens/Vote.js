import React from 'react';
import { View, Text,TouchableOpacity ,StyleSheet,FlatList,Alert} from 'react-native';
import { useSelector } from 'react-redux';
import axios from '../axios';
import { useState, useEffect } from "react";
import { Image } from 'react-native';



export default function HomeScreen({navigation}){
  const [candidates, setCandidates] = useState([]);

  


  useEffect(() => {
    (async () => {
      await axios.get('candidates')
      .then(response => {
        setCandidates(response.data);
        
      })
      .catch(error => {
        Alert.alert('Error', 'Failed to fetch candidate data');
      });
    })();
  }, []);

  useEffect(() => {
    (async () => {
      axios.get('image-link')
        .then(response => {
        const imageURL = response.data.imageURL;
       // Use the imageURL to display the image
     })
       .catch(error => {
        console.log(error);
});

    })();
  }, []);
  

  const handleVote = (con_id) => {
    // Submit vote to API using Axios
    axios.post('vote', {con_id})
      .then(response => {
        Alert.alert('Success', 'Your vote has been submitted');
        navigation.navigate('Thanks');
      }) 
      .catch(error => {
        if (error.response && error.response.status === 401) {
          Alert.alert('Error', 'You have no more votes remaining.');
          navigation.navigate('Thanks');

        } else{
        Alert.alert('Error', 'Failed to submit vote');
        navigation.navigate('Thanks');}
      });
      
  };



  return (
    <View style={styles.container}>
    <FlatList
  data={candidates}
  keyExtractor={candidate => candidate.id.toString()}
  renderItem={({ item: candidate }) => (
    <View style={{ padding: 20 }}>
      <Text>ID: {candidate.id}</Text>


      
      <Image source={{ uri: 'imageURL' + candidate.image/*uri: candidate.image`imageURL/${candidate.image}`*/}} style={{ width: 100, height: 100 }} />
      <Text>Candidate Name: {candidate.fname}</Text>
      <Text>About : {candidate.lname}</Text>
      <Text>Position: {candidate.positions.positions}</Text>
      {candidate.isVoted ? (
        <TouchableOpacity disabled style={{ backgroundColor: 'gray', padding: 10 }}>
          <Text style={{ color: 'white' }}>Submitted</Text>
        </TouchableOpacity>
      ) : (
        <TouchableOpacity onPress={() => handleVote(candidate.id)} style={{ backgroundColor: 'green', padding: 10,borderRadius:9 }}>
          <Text style={{ color: 'white' }}>Submit</Text>
        </TouchableOpacity>
      )}
    </View>
  )}
  ListEmptyComponent={() => <Text>No candidates found</Text>}
/>

<TouchableOpacity onPress={async()=>{
      await axios.post('logout');
       navigation.navigate('Voting System')
       }} style={{width:'20%',backgroundColor:'#1199cc',marginTop:30,borderRadius:9,padding:9,justifyContent:'center',marginBottom:17,marginLeft:15}}>
       <Text style={{color:'white',textAlign:'center'}}>Logout</Text>
     </TouchableOpacity>


</View>

  );}




  const styles= StyleSheet.create({
    container: {  
      justifyContent:'center',
      height:'100%',
      marginTop:1
    }
  })






