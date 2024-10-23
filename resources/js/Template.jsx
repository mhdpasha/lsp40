import { Navbar, Footer } from './App/Components'
import { usePage } from '@inertiajs/react'
import { motion, AnimatePresence } from 'framer-motion'
import { useEffect, useState } from 'react'

const pageVariants = {
  initial: {
    opacity: 0,
    y: 20
  },
  enter: {
    opacity: 1,
    y: 0,
    transition: {
      duration: 0.4,
      ease: "easeOut",
      when: "beforeChildren",
      staggerChildren: 0.1
    }
  },
  exit: {
    opacity: 0,
    y: -20,
    transition: {
      duration: 0.3,
      ease: "easeIn"
    }
  }
}

export default function Template({ children }) {
  const { url } = usePage()
  const [isFirstMount, setIsFirstMount] = useState(true)

  useEffect(() => {
    setIsFirstMount(false)
  }, [])

  return (
    <motion.main 
      className="flex flex-col min-h-screen font-inter"
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      exit={{ opacity: 0 }}
      transition={{ duration: 0.3 }}
    >
      <Navbar url={url}/>
      
      <AnimatePresence 
        mode="wait"
        initial={!isFirstMount}
        onExitComplete={() => window.scrollTo(0, 0)}
      >
        <motion.article 
          className="container mx-auto flex-grow p-4 antialiased"
          key={url}
          initial="initial"
          animate="enter"
          exit="exit"
          variants={pageVariants}
        >
          {children}
        </motion.article>
      </AnimatePresence>
      
      <Footer/>
    </motion.main>
  )
}