import React, { useEffect, useState } from 'react';
import { View, Text,TouchableOpacity ,StyleSheet} from 'react-native';
import axios from '../axios';
import {useSelector,useDispatch} from 'react-redux'
import {setUser} from '../redux/user/action'
import * as SecureStore from 'expo-secure-store'


export default function Home({navigation}){
  const user = useSelector((store) => store.user.user)

  useEffect(()=>{
    ( async()=>{
         const token = await SecureStore.getItemAsync('token')

         if(token){
             axios.defaults.headers.common['Authorization'] = "Bearer "+token
             axios.get('profile').then(({data})=>{
                 dispatch(setUser(data.data))
             }).catch(async()=>{
                 await SecureStore.deleteItemAsync('token')
             })
         }
     })();
 },[])



      return (
    <View style={{alignItems:'center',justifyContent:'center',height:'80%',marginTop:10}}>
      <View style={{backgroundColor:'white',padding:10,borderRadius:10}}>
        <Text style={{fontSize:20,fontWeight: 'bold'}}>WELCOME TO VOTING APP</Text>
      <Text style={{marginTop:10}}> {user.name} </Text>
      <Text style={{marginTop:10}}> {user.email} </Text>
      



      <TouchableOpacity onPress={async()=>{
         navigation.navigate('Vote')
         }}
          style={[style.input,{width:'100%'},{backgroundColor:'#1199cc'},{marginTop:30}]}>
         <Text style={{color:'white',textAlign:'center'}}>Proceed to vote</Text>
       </TouchableOpacity>



      <TouchableOpacity onPress={async()=>{
        await axios.post('logout');
         navigation.navigate('Voting System')
         }} style={[style.input,{width:'20%'},{backgroundColor:'#1199cc'},{marginTop:80}]}>
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
