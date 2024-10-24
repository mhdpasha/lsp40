import { motion } from 'framer-motion'
import { 
  Award, CheckCircle, Users, BookOpen, 
  Briefcase, Target, Clock, Star,
  Shield, Trophy, GraduationCap,
  ArrowRight, Sparkles
} from 'lucide-react'

const Home = () => {
  const container = {
    hidden: { opacity: 0 },
    visible: {
      opacity: 1,
      transition: {
        staggerChildren: 0.15,
        delayChildren: 0.3,
      },
    },
  }

  const item = {
    hidden: { opacity: 0, y: 20 },
    visible: {
      opacity: 1,
      y: 0,
      transition: {
        ease: "anticipate",
        duration: 0.8,
      },
    },
  }

  const letterVariants = {
    hidden: { opacity: 0, y: 50 },
    visible: {
      opacity: 1,
      y: 0,
      transition: {
        ease: "anticipate",
        duration: 0.8,
      },
    },
  }

  const titleWords = "Professional Certification Excellence".split(" ")

  const stats = [
    { 
      number: "1000+", 
      label: "Certified Professionals",
      icon: Users,
      color: "blue" 
    },
    { 
      number: "95%", 
      label: "Success Rate",
      icon: CheckCircle,
      color: "green" 
    },
    { 
      number: "50+", 
      label: "Industry Partners",
      icon: Briefcase,
      color: "purple" 
    },
    { 
      number: "24/7", 
      label: "Support Available",
      icon: Shield,
      color: "indigo" 
    },
  ]

  return (
    <main className="min-h-screen relative overflow-hidden rounded-t-full">
      <div className="absolute inset-0 bg-[url('/grid.svg')] opacity-5" />
      <div className="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob" />
      <div className="absolute top-0 -right-4 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-20 animate-blob animation-delay-2000" />
      
      <section className="relative pt-20 pb-32 px-4">
        <motion.div
          className="max-w-4xl mx-auto text-center"
          variants={container}
          initial="hidden"
          animate="visible"
        >
          <motion.div variants={item} className="mb-6 inline-block">
            <span className="px-4 py-2 rounded-full bg-blue-50 text-blue-600 text-sm font-medium inline-flex items-center gap-2">
              <Sparkles className="w-4 h-4" />
              BNSP Certified Institution
            </span>
          </motion.div>
          
          <div className="overflow-hidden mb-8">
            <motion.div 
              className="flex flex-wrap justify-center gap-x-4 text-5xl md:text-6xl font-bold"
              variants={container}
              initial="hidden"
              animate="visible"
            >
              {titleWords.map((word, i) => (
                <motion.span
                  key={i}
                  variants={letterVariants}
                  className="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600"
                >
                  {word}
                </motion.span>
              ))}
            </motion.div>
          </div>
          
          <motion.p 
            variants={item}
            className="text-xl text-gray-600 mb-12 max-w-2xl mx-auto"
          >
            Transform your career with industry-recognized certifications backed by BNSP standards.
          </motion.p>
          
          <motion.div variants={item} className="flex gap-4 justify-center">
            <button className="px-8 py-4 rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 text-white font-medium hover:opacity-90 transition-opacity inline-flex items-center gap-2">
              Get Started Now
              <ArrowRight className="w-4 h-4" />
            </button>
            <button className="px-8 py-4 rounded-lg border-2 border-gray-300 text-gray-700 font-medium hover:border-blue-600 hover:text-blue-600 transition-colors">
              View Certifications
            </button>
          </motion.div>
        </motion.div>
      </section>

      <motion.section 
        className="py-20 bg-gradient-to-b from-blue-50 to-white rounded-3xl mx-4"
        variants={container}
        initial="hidden"
        whileInView="visible"
        viewport={{ once: true }}
      >
        <div className="max-w-6xl mx-auto px-4">
          <div className="grid grid-cols-2 md:grid-cols-4 gap-8">
            {stats.map((stat, index) => (
              <motion.div
                key={index}
                variants={item}
                className="text-center p-6 rounded-2xl bg-white shadow-lg hover:shadow-xl transition-shadow"
              >
                <div className={`w-12 h-12 mx-auto mb-4 rounded-full flex items-center justify-center bg-${stat.color}-50`}>
                  <stat.icon className={`w-6 h-6 text-${stat.color}-500`} />
                </div>
                <h3 className="text-4xl font-bold text-gray-900 mb-2">{stat.number}</h3>
                <p className="text-gray-600">{stat.label}</p>
              </motion.div>
            ))}
          </div>
        </div>
      </motion.section>

      <section className="py-32 px-4">
        <motion.div 
          className="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-6"
          variants={container}
          initial="hidden"
          whileInView="visible"
          viewport={{ once: true }}
        >
          {/* Main Feature Box */}
          <motion.div
            variants={item}
            className="md:col-span-2 md:row-span-2 p-10 rounded-3xl bg-gradient-to-br from-blue-500 to-purple-600 text-white relative overflow-hidden group"
          >
            <div className="absolute inset-0 bg-[url('/grid.svg')] opacity-10" />
            <div className="relative z-10">
              <GraduationCap className="w-12 h-12 mb-6" />
              <h3 className="text-3xl font-bold mb-4">Start Your Certification Journey</h3>
              <p className="text-lg mb-6 text-blue-50">Get certified in your field of expertise with our comprehensive programs.</p>
              <button className="px-6 py-3 rounded-lg bg-white text-blue-600 font-medium hover:bg-blue-50 inline-flex items-center gap-2 group-hover:gap-3 transition-all">
                Explore Programs
                <ArrowRight className="w-4 h-4" />
              </button>
            </div>
          </motion.div>

          {/* Bento Grid Items */}
          <motion.div
            variants={item}
            className="p-8 rounded-3xl bg-gray-900 text-white hover:scale-[1.02] transition-transform"
          >
            <Award className="w-10 h-10 mb-6" />
            <h3 className="text-2xl font-bold mb-4">Industry Recognition</h3>
            <p className="text-gray-300">Trusted by leading companies across industries</p>
          </motion.div>

          <motion.div
            variants={item}
            className="p-8 rounded-3xl bg-gradient-to-br from-blue-50 to-purple-50 hover:scale-[1.02] transition-transform"
          >
            <Clock className="w-10 h-10 text-blue-600 mb-6" />
            <h3 className="text-2xl font-bold mb-4">Quick Process</h3>
            <p className="text-gray-600">Complete your certification in as little as 4 weeks</p>
          </motion.div>

          <motion.div
            variants={item}
            className="p-8 rounded-3xl bg-gradient-to-br from-purple-50 to-pink-50 hover:scale-[1.02] transition-transform"
          >
            <Users className="w-10 h-10 text-purple-600 mb-6" />
            <h3 className="text-2xl font-bold mb-4">Expert Support</h3>
            <p className="text-gray-600">Get guidance from industry professionals</p>
          </motion.div>

          <motion.div
            variants={item}
            className="md:col-span-2 p-8 rounded-3xl bg-gradient-to-br from-gray-100 to-blue-50 hover:scale-[1.02] transition-transform"
          >
            <Target className="w-10 h-10 text-gray-800 mb-6" />
            <h3 className="text-2xl font-bold mb-4">Career Growth</h3>
            <p className="text-gray-600">Join thousands who've advanced their careers through our certifications</p>
            <div className="mt-6 flex gap-4 items-center">
              <div className="flex -space-x-4">
                {[...Array(4)].map((_, i) => (
                  <div key={i} className="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 border-2 border-white" />
                ))}
              </div>
              <p className="text-gray-600">+1000 certified professionals</p>
            </div>
          </motion.div>
        </motion.div>
      </section>

      <motion.section 
        className="py-32 bg-gradient-to-b from-blue-50 to-white rounded-3xl mx-4"
        variants={container}
        initial="hidden"
        whileInView="visible"
        viewport={{ once: true }}
      >
        <div className="max-w-6xl mx-auto px-4">
          <motion.h2 
            variants={item}
            className="text-4xl font-bold text-center mb-16"
          >
            What Our Graduates Say
          </motion.h2>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {[1, 2, 3].map((_, index) => (
              <motion.div
                key={index}
                variants={item}
                className="p-8 rounded-2xl bg-white shadow-lg hover:shadow-xl transition-shadow"
              >
                <div className="flex items-center mb-6">
                  <div className="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 mr-4" />
                  <div>
                    <h4 className="font-semibold">Professional Name</h4>
                    <p className="text-gray-600">Industry Expert</p>
                  </div>
                </div>
                <p className="text-gray-600">
                  "The certification process was thorough and professional. It has helped me advance my career significantly."
                </p>
                <div className="mt-4 flex text-yellow-400">
                  {[...Array(5)].map((_, i) => (
                    <Star key={i} className="w-5 h-5 fill-current" />
                  ))}
                </div>
              </motion.div>
            ))}
          </div>
        </div>
      </motion.section>

      <motion.section 
        className="py-32 px-4"
        variants={container}
        initial="hidden"
        whileInView="visible"
        viewport={{ once: true }}
      >
        <motion.div 
          variants={item}
          className="max-w-4xl mx-auto rounded-3xl bg-gradient-to-br from-blue-500 to-purple-600 p-16 text-center relative overflow-hidden"
        >
          {/* Background texture */}
          <div className="absolute inset-0 bg-[url('/grid.svg')] opacity-10" />
          <div className="relative z-10">
            <Trophy className="w-16 h-16 text-white mx-auto mb-8" />
            <h2 className="text-4xl font-bold text-white mb-8">
              Ready to Get Certified?
            </h2>
            <p className="text-xl text-blue-50 mb-12 max-w-2xl mx-auto">
              Join thousands of professionals who have advanced their careers with our certifications.
            </p>
            <motion.button 
              variants={item}
              className="px-8 py-4 rounded-lg bg-white text-blue-600 font-medium hover:bg-blue-50 transition-colors inline-flex items-center gap-2 group-hover:gap-3"
            >
              Start Your Journey
              <ArrowRight className="w-5 h-5" />
            </motion.button>
          </div>
        </motion.div>
      </motion.section>
    </main>
  )
}

export default Home