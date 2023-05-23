import React from 'react';
import { View, Text,TouchableOpacity ,StyleSheet} from 'react-native';
import { useSelector } from 'react-redux';
import axios from '../axios';


export default function End({navigation}){


      return (
    <View style={{alignItems:'center',justifyContent:'center',height:'80%',marginTop:10}}>
      <View style={{backgroundColor:'white',padding:10,borderRadius:10}}>
        <Text style={{fontSize:20,fontWeight: 'bold'}}>Thank You!!!</Text>
        <Text style={{fontSize:16,fontWeight: 'bold',marginTop:5}}>See you in next election..</Text>

        <TouchableOpacity onPress={async()=>{
        await axios.post('logout');
         navigation.navigate('Voting System')
         }} style={[style.input,{width:'20%'},{backgroundColor:'#1199cc'},{marginTop:40}]}>
         <Text style={{color:'white',textAlign:'center'}}>Logout</Text>
       </TouchableOpacity>
        
      </View>

      
    
    </View>
    
  );
}


const style= StyleSheet.create({
  input:{
      padding:7,borderRadius:6
  }
})
