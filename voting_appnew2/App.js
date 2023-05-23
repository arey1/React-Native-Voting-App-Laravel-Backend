import React from 'react';
import { View, Text,StyleSheet } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { Provider } from 'react-redux';

import Login from './screens/Login'
import Home from './screens/Home'
import Vote from './screens/Vote';
import End from './screens/End'
import {store} from './redux/store'








const Stack = createNativeStackNavigator();

function App() {
  return (
    <Provider  store={store}>
    <NavigationContainer>
      
      <Stack.Navigator  initialRouteName='Voting System'>
        <Stack.Screen  name="Voting System" component={Login} />
        <Stack.Screen name="Home" component={Home} />
       <Stack.Screen name="Vote" component={Vote} />
       <Stack.Screen name="Thanks" component={End} />
      </Stack.Navigator>
      
    </NavigationContainer>
    </Provider>
  );
}

export default App;

const style= StyleSheet.create({
  input:{
      backgroundColor:'grey'
  }
})