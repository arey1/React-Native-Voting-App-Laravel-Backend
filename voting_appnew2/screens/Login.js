import React, { useEffect, useState } from 'react';
import { View, Text, TextInput,TouchableOpacity,StyleSheet } from 'react-native';
import { SafeAreaView } from 'react-native-safe-area-context';

import axios from '../axios';
import * as SecureStore from 'expo-secure-store'

import {useSelector,useDispatch} from 'react-redux'
import {setUser} from '../redux/user/action'

export default function Login({navigation}) {

    const dispatch = useDispatch()

    const user = useSelector((store)=> store.user.user)

    const [form,setForm] = useState({
        vote_id:'',
        password:'',
    })

    const[error,setError]=useState([])

    const login = ()=>{

        setError([])

        axios.post('login',form).then(async({data})=>{
            dispatch(setUser(data.user))

            await SecureStore.setItemAsync('token',data.token)
            axios.defaults.headers.common['Authorization'] = "Bearer "+data.token
            navigation.navigate('Home')


        }).catch((err)=>{
            setError(err.response.data.errors)
        })
    }

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
    <SafeAreaView>
        <View style={{justifyContent:'center',alignItems:'center',height:'80%'}}>
            <View style={{backgroundColor:'white',padding:10,width:'80%',borderRadius:10}}>
                <Text style={{fontSize:20,fontWeight:'bold'}}>Login Page</Text>

               {/* <Text style={{fontSize:20}}>{user.email}</Text>*/}



                <Text style={{color:'red',marginTop:10}}>{error?.message ? error.message : ''}</Text>


                <View style={{marginTop:10}}>
                    <Text style={{marginBottom:10}}>Voter ID</Text>
                    <TextInput onChangeText={(text)=>{form.vote_id = text}} style={[style.input,{backgroundColor:'#E8E8E8'}]}/>
                    <Text style={{color:'red'}}>{error?.vote_id ? error.vote_id[0] : ''}</Text>
                </View>

                <View style={{marginTop:15}}>
                    <Text style={{marginBottom:10}}>Password</Text>
                    <TextInput onChangeText={(text)=>{form.password = text}} secureTextEntry={true} style={[style.input,{backgroundColor:'#E8E8E8'}]}/>
                    <Text style={{color:'red'}}>{error?.password ? error.password[0] : ''}</Text>
                </View>

                <View style={{marginTop:25}}>
                    <TouchableOpacity onPress={()=>{login();
                    navigation.navigate('Voting System')}
                } style={[style.input,{width:'20%'},{backgroundColor:'#1199cc'}]}>
                        <Text style={{color:'white',textAlign:'center'}}>Login</Text>
                    </TouchableOpacity>

                </View>

            </View>

        </View>
    </SafeAreaView>
    
  );
}

const style= StyleSheet.create({
    input:{
        padding:7,borderRadius:6
    }
})

